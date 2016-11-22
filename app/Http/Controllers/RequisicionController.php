<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Requests;
use sig\Models\Existencia;
use sig\Models\Requisicion;
use sig\Models\DetalleRequisicion;
use Jenssegers\Date\Date;

class RequisicionController extends Controller
{
   
  public function __construct()
   {
    if(!\Session::has('requisicion')) 
     
      \Session::put('requisicion',array());

  }      
   
   //funcion para ver la requisicion que se esta creando
   public function ver()
   {
      $req = Requisicion::whereRaw('estado = ? and departamento_id = ?',array('almacenada',\Auth::User()->departamento_id))->first();
        if($req){
            $requisicion = \Session::get('requisicion');
            $total = $this->total();
            return view('Requisicion.crear',['requisicion'=>$requisicion,'total'=>$total]);
        }
        else{
          Requisicion::create([
                   'estado' =>'almacenada',
                   'departamento_id' =>\Auth::User()->departamento_id,                   
                  ]);
          $requisicion = \Session::get('requisicion');
          $total = $this->total();
          return view('Requisicion.crear',['requisicion'=>$requisicion,'total'=>$total]);
        }

    
   }

   public function add($cod, $cantidad){
        $articulo= Existencia::where('id_art_pres',$cod)->first();
        $articulo->cantidad = $cantidad;
        $req = \Session::get('requisicion');
        $req[$articulo->id_art_pres]=$articulo;
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
                   'codigo' =>$r->articulo['codigo_articulo'],
                   'nombre' =>$r->articulo['nombre_articulo'],
                   'presentacion'=>$r->presentacion['presentacion'],
                   'unidad_medida'=>$r->articulo['unidad']['nombre_unidadmedida'],
                   'cantidad_solicitada'=>$r->cantidad,
                   'precio'=>$r->precio_unitario,
                   'requisicion_id'=>$req->id,
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
}
