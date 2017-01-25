<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Requests;
use sig\Models\Articulo;
use sig\Models\Requisicion;
use sig\Models\DetalleRequisicion;
use Jenssegers\Date\Date;
use Auth;
use DB;

class RequisicionController extends Controller
{
   
  public function __construct()
   {
    if(!\Session::has('requisicion')) 
     
      \Session::put('requisicion',array());

  }      
   
   //funcion para ver la requisicion que se esta creando
   public function crear()
   {
      $req = Requisicion::whereRaw('estado = ? and departamento_id = ?',array('almacenada',\Auth::User()->departamento_id))->first();
  
        if($req){
            $artuculos = \Session::get('requisicion');
            $total = $this->total();
            return view('Requisicion.crear',['articulos'=>$artuculos,'total'=>$total,'requisicion'=>$req]);
        }
        else{
          Requisicion::create([
                   'estado' =>'almacenada',
                   'departamento_id' =>\Auth::User()->departamento_id,                   
                  ]);
          $artuculos = \Session::get('requisicion');
          $total = $this->total();
          return view('Requisicion.crear',['articulos'=>$artuculos,'total'=>$total,'requisicion'=>$req]);
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
              'total' => $total,
              'fecha_solicitud' =>Date::now(),            
              ]); 
      //eliminamos la variable de sesion
       \Session::forget('requisicion'); 
      return redirect('home');
     
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
}
