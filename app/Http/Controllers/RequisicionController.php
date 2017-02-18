<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Requests;
use sig\Models\Articulo;
use sig\Models\Requisicion;
use sig\Models\DetalleRequisicion;
use sig\Models\Department;
use Jenssegers\Date\Date;
use sig\Models\CodigoRequisicion;
use Auth;
use DB;

class RequisicionController extends Controller
{
    
  public function __construct()
   {
    if(!\Session::has('requisicion')) 
     
      \Session::put('requisicion',array());

    $this->middleware('auth');
  }      
   
   //funcion para ver la requisicion que se esta creando
   public function crear()
   {
    if(\Auth::User()->departamento['enviar']=='true'){
        $req = Requisicion::whereRaw('estado = ? and departamento_id = ?',array('almacenada',\Auth::User()->departamento_id))->first();
       
        if($req){
            $artuculos = \Session::get('requisicion');
            $total = $this->total();
            return view('Requisicion.crear',['articulos'=>$artuculos,'total'=>$total,'requisicion'=>$req]);
        }
        else{
          $date = Date::now();
          $año = $date->format('Y');
          $inicio = new Date($año.'-1-1');
          $fin= new Date($año.'-12-31');
          $requisiciones =Requisicion::whereBetween('created_at', array($inicio, $fin))->get();
          $codigo = CodigoRequisicion::getCodigo($requisiciones);
          Requisicion::create([
                  'id'=>$codigo,
                  'estado' =>'almacenada',
                  'departamento_id' =>\Auth::User()->departamento_id,                   
                  ]);
          $artuculos = \Session::get('requisicion');
          $total = $this->total();
          return view('Requisicion.crear',['articulos'=>$artuculos,'total'=>$total,'requisicion'=>$req]);
        }
    }
    else{
      flash('No es periodo de envío de Requisiciones','danger');
      return back();
    }
        
   
   }

   public function add($cod, $cantidad){

        $articulo= Articulo::where('codigo_articulo',$cod)->first();
        $articulo->cantidad = $cantidad;
        $req = \Session::get('requisicion');
        $req[$articulo->codigo_articulo]=$articulo;
        \Session::put('requisicion',$req);

      return redirect()->route('requisicion-show');
   }

   //funcion para eliminar articulos de la lista
    public function delete($cod)
    {
       $req = \Session::get('requisicion');
       unset($req[$cod]);
       \Session::put('requisicion',$req);
       return redirect()->route('requisicion-show');
    }
    //funcion para vaciar la variable de session requisicion
    public function trash()
    {
      \Session::forget('requisicion');
      return redirect('home');
    }

    //funcion para calcular el total
    private function total()
    {
        $req= \Session::get('requisicion');
        $total = 0 ;
        foreach ($req as $r) {
          $total += $r->precio_unitario*$r->cantidad;
        }
        return $total;
    }

   
    public function create()
    {
      //
    }

   
    public function store()
    {    
     
      if(\Session::has('requisicion') and !empty(\Session::get('requisicion')))
      {
              $requisicion = \Session::get('requisicion');
              $total = $this->total();
             //obtener requisicion
            $req = Requisicion::where(['estado'=>'almacenada','departamento_id'=>\Auth::User()->departamento_id])->first();            
             //guardamos cada registro de articulos a pedir
            foreach ($requisicion as $r) {
               DetalleRequisicion::create([                
                         'cantidad_solicitada'=>$r->cantidad,
                         'precio'=>$r->precio_unitario,
                         'requisicion_id'=>$req->id,
                         'articulo_id'=>$r->codigo_articulo,
                        ]);
            }
            //actualizar requisicion
            $req->update([
                    'estado' => 'enviada',                    
                    'fecha_solicitud' =>Date::now(),            
                    ]); 
            //eliminamos la variable de sesion
             \Session::forget('requisicion'); 
            return redirect('home');
      }
      else{
        flash('No ha ingresado ningun articulo','danger');
        return back();
      }    

     
    } // fin de almacenar(store) la requisicion y sus detalles

    
    public function show($id)
    {
       //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update($cod, $cantidad)
    {
       $req = \Session::get('requisicion');
       $req[$cod]->cantidad=$cantidad;
       \Session::put('requisicion',$req);

       return redirect()->route('requisicion-show');
    }

   
   
    public function destroy($id)
    {
        //
    }
    //mostrar todas las requisiciones
     public function index()
    {
      if(Auth::User()->perfil_id==4)       
        {
          $requisicion = DB::table('requisicions')->where([['estado','!=','almacenada'],['departamento_id','=',Auth::User()->departamento_id]])->get();
          return view('Requisicion.departamento_lista',['requisicion'=>$requisicion]);
        }
        else
        {
          if(Auth::User()->perfil_id==3){
              $requisiciones = Requisicion::where('estado','=','actualizada')->get();
          }
          else{
              $requisiciones = Requisicion::where('estado','!=','almacenada')->get();             
          }
          return view('Requisicion.index',['requisicion'=>$requisiciones]);         
        }           

    }
    public function HabilitarEnvio(){
       $departamentos = Department::orderBy('name','asc')->get();
      return view('Requisicion.habilitar_envio_panel',['departamentos'=>$departamentos]);
    }

    public function gestionarEnvios($id){
      if($id==-7){
        $departamentos = Department::all();
        foreach ($departamentos as $d) {
          $d->update([
            'enviar' => 'true',                       
          ]);           
        }
      }
      else
      {
        if($id==-9){
          $departamentos = Department::all();
            foreach ($departamentos as $d) {
              $d->update([
                'enviar' => 'false',                       
              ]);           
            }
        }
        else
        {
          $departamento = Department::where('id',$id)->first();
          if($departamento->enviar=='true')
          {
            $departamento->update([
              'enviar' => 'false',                       
            ]);
          }
          else{
             $departamento->update([
              'enviar' => 'true',                       
            ]);
          }                      
          
        }  
      }
      return back();
     
    }
}
