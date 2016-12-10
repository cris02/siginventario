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
        $req  = Requisicion::FindOrFail($id);
        $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
        return view('Requisicion.bodega_ver',['detalle'=>$detalle,'requisicion'=>$req]); 
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
            if(Auth::User()->perfil_id==3)
            {
                $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
                return view('Requisicion.financiero_ver',['detalle'=>$detalle,'requisicion'=>$req]);  
            }
            else
            {
                return view('Requisicion.actualizar',['detalle'=>$detalle,'requisicion'=>$req]);  
            } 
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
         $lista_detalles =  DetalleRequisicion::all();
         $cantidad_aprobada = 0.0;
         foreach ($lista_detalles as $l)
         {
            $cantidad_aprobada += $l->cantidad_entregada;
         }      
        
         if($d->articulo['existencia'] < $request->cantidad_aprobada)
         {
            flash('No hay suficientes existencias.', 'danger');
         }
         else{
           
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
    public function aprobar($id)
    {
         $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
         $requisicion = Requisicion::where('id','=',$id);
         if(Auth::User()->perfil_id==2)
         {
           $requisicion->update([
                'estado' => 'actualiza',
                ]);
            return back(); 
         }
         foreach ($detalle as $d)
         {
            $a= Articulo::where('codigo_articulo',$d->articulo['codigo_articulo'])->first();
            $a->update([
                'existencia' => $a->existencia-$d->cantidad_entregada,
                ]);
        }
         $requisicion->update([
                'estado' => 'aprobada',
                ]);
            return back();
    }

   
}
