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
use sig\User;
use PDF;

class DetalleRequisicionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $articulos = Articulo::where('existencia','>','0')->get();     
         return view('Requisicion.agregar',['articulos'=>$articulos]);
    }

   
    //agregar observaciones a la requisicion
    public function observacion($id)
    {
       $requisicion  = Requisicion::FindOrFail($id);
        return view('Requisicion.observaciones',['requisicion'=>$requisicion]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //store se utilizó para almacenar observaciones sobre la requisicion de parte del depto
    public function store(Request $request)
    {

       $requisicion  = Requisicion::FindOrFail($request->id);
       
        if(Auth::User()->perfil_id==4)
        {
            $requisicion->update([
                'observacion' => $request->observaciones,
            ]);
            return redirect()->route('requisicion-show'); 
        }
        else{
            $requisicion->update([
                'observacion' => $request->observaciones,
            ]);
            flash('Observacion guardada', 'success');
            return back();
        }

       
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
         $this->validate($request,[
            'cantidad' => 'required |integer|min:1|max:1000',            
        ]); 
         $d = DetalleRequisicion::FindOrFail($id); 
         
          if($d->requisicion['estado']=='aprobada')
         {
            return redirect()->route('requisicion-listar');  
         }
        else
        {//inicia else si no esta aprobada

         $lista_detalles =  DetalleRequisicion::where('estado','actualizada');
         $cantidad_aprobada = 0.0;
         foreach ($lista_detalles as $lista)
         {
            $cantidad_aprobada = $cantidad_aprobada + $lista->cantidad_entregada;
         } 
        $quedan =  $d->articulo['existencia'] - $cantidad_aprobada;    
        $cantidad_aprobada = $cantidad_aprobada + $request->cantidad;        
        
             if($d->articulo['existencia'] < $cantidad_aprobada)
             {
                flash('Unicamente '.$quedan.' Existencias', 'danger');
             }
             else{            
                    $d->update([
                    'cantidad_entregada' => $request->cantidad,
                    ]);        
             }
        }//finaliza else si no esta aprobada
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
         $requisicion = Requisicion::where('id','=',$id)->first();
  
        if(Auth::User()->perfil_id==2)
        {            
            $requisicion->update([
            'estado' => 'actualizada',
            'bodega_id'  =>  Auth::User()->id,            
            ]);            
        }
        else
        {
            if(Auth::User()->perfil_id==3)
            foreach ($detalle as $d)
            {
                $a= Articulo::where('codigo_articulo',$d->articulo['codigo_articulo'])->first();
                $a->update([
                    'existencia' => $a->existencia-$d->cantidad_entregada,
                ]);
            }
            $requisicion->update([
                'estado' => 'aprobada',
                'fecha_entrega' =>Date::now(),
                'financiero_id'  =>  Auth::User()->id,            
                ]);
        }//fin del else
         
           return redirect()->route('requisicion-listar');
    }
    public function imprimir($id){
        $req  = Requisicion::FindOrFail($id);       
        $admin_financiero  = User::where('id','=',$req->financiero_id)->first();
        
        $admin_bodega = User::where('id','=',$req->bodega_id)->first();
        $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
        $date = new Date($req->fecha_entrega);
        $fecha = array('fecha' => $date->format('l, j \d\e F \d\e Y'),'año'=>$date->format('Y'));
        $usuarios = array('bodega'=>$admin_bodega->name,'financiero'=>$admin_financiero->name);

        $total=0;
        foreach ($detalle as $d) {
          $total += $d->articulo['precio_unitario']*$d->cantidad_entregada;
        }

        //return view('Requisicion.imprimir',['detalle'=>$detalle,'requisicion'=>$req,'fecha'=>$fecha,'usuarios'=>$usuarios, 'total'=>$total]); 
        $nombre = "requisicion_".$req->id.".pdf";


        $pdf = PDF::loadView('Requisicion.imprimir',['detalle'=>$detalle,'requisicion'=>$req,'fecha'=>$fecha,'usuarios'=>$usuarios, 'total'=>$total]);
        return $pdf->stream(); 
        //return $pdf->download($nombre); 

              
    }

   
}
