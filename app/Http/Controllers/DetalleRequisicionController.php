<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;
use sig\Http\Requests;
use sig\Models\Articulo;
use Jenssegers\Date\Date;
use sig\Models\Requisicion;
use sig\Models\DetalleRequisicion;
use Laracasts\Flash\Flash;
use Auth;

class DetalleRequisicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articulos = Articulo::where('existencia','>','0')->get();     
         return view('Requisicion.agregar',['articulos'=>$articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$var = new \DateTime();
        //echo Date::now()->format('l j F Y H:i:s'); 
         

        return Date::now()->format('m');  
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
        $req  = Requisicion::FindOrFail($id);

        if(Auth::User()->perfil_id==4)
        {
            return view('Requisicion.departamento_ver',['detalle'=>$detalle,'requisicion'=>$req]);
        }       
        else
        {
            return view('Requisicion.actualizar',['detalle'=>$detalle,'requisicion'=>$req]);   
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $d = DetalleRequisicion::FindOrFail($id);
         $a= Articulo::where('codigo_articulo',$d->articulo['codigo_articulo'])->first();
        
         if($d->articulo['existencia'] < $request->cantidad)
         {
            flash('No hay suficientes existencias.', 'danger');
         }
         else{
             $a->update([
                'existencia' => $a->existencia-$request->cantidad,
                ]);
             $d->update([
                'cantidad_entregada' => $request->cantidad,
                ]);
         }
          return back();
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}
