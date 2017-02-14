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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // agregar un comentario si lo necesita.
    public function comentar($id)
    {
        $requisicion  = Requisicion::FindOrFail($id);
        return view('Requisicion.comentario',['requisicion'=>$requisicion]);  
       
    }
    public function observacion($id)
    {
        $requisicion  = Requisicion::FindOrFail($id);
        return view('Requisicion.observacion',['requisicion'=>$requisicion]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //store se utilizó para almacenar el comentario sobre la requisicion de parte del depto
    public function store(Request $request)
    {

       $requisicion  = Requisicion::FindOrFail($request->id);
       
        if(Auth::User()->perfil_id==4)
        {
            $requisicion->update([
                'descripcion' => $request->comentario,
            ]);
            return redirect()->route('requisicion-show'); 
        }
        else{
            $requisicion->update([
                'comentario' => $request->descripcion,
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
         $requisicion = Requisicion::where('id','=',$id);
        if(Auth::User()->perfil_id==2)
        {
           $requisicion->update([
                'estado' => 'actualizada',
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
                ]);
        }//fin del else
         
           return redirect()->route('requisicion-listar');
    }
    public function imprimir($id){
        $req  = Requisicion::FindOrFail($id);
        $admin_financiero  = User::where('perfil_id','=',3)->first();
        $detalle = DetalleRequisicion::where('requisicion_id','=',$id)->get();
        $date = new Date($req->fecha_entrega);
        $fecha = array('fecha' => $date->format('l, j \d\e F \d\e Y'),'año'=>$date->format('Y'));
        $usuarios = array('bodega'=>Auth::User()->name,'financiero'=>$admin_financiero->name);

        //return view('Requisicion.imprimir',['detalle'=>$detalle,'requisicion'=>$req,'fecha'=>$fecha]); 
        $nombre = "requisicion_".$req->id.".pdf";


        $pdf = PDF::loadView('Requisicion.imprimir',['detalle'=>$detalle,'requisicion'=>$req,'fecha'=>$fecha,'usuarios'=>$usuarios]);
        return $pdf->stream(); 
        //return $pdf->download($nombre); 

              
    }

   
}
