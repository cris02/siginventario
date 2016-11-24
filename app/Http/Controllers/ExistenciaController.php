<?php

namespace sig\Http\Controllers;
use sig\Models\Articulo;

use Illuminate\Http\Request;

use sig\Http\Requests;

use sig\Models\Existencia;

class ExistenciaController extends Controller
{
    public function index($buscar=""){
		$articulos = Articulo::orderBy('nombre_articulo','asc')->get();		
		return view('existencia.index',['articulos'=>$articulos,'buscar'=>$buscar]);
	}
	
	

    public function store(Request $request)
    {
        $this->validate($request,[
		    
			'producto' => 'required |exists:articulo,codigo_articulo',

			'presentacion' => 'required | exists:presentacion,id_pres'
		]);	    
						
        $existencia =Existencia::where([
                        ['id_pres', '=',$request->input('presentacion') ],
                        ['codigo_articulo', '=', $request->input('producto')],
                        ])->first();
        if($existencia){
			flash('La presentacion para el articulo ya existe','danger');
			return redirect()->back();
		}						
				    Existencia::create([
				        'codigo_articulo' =>$request->input('producto'),		    
		                'id_pres' =>$request->input('presentacion')				        				  				   
				    ]);
					
					flash('La presentacion para el articulo fue guardada exitosamente','success');
		            return redirect()->route('existencia.index');
				
		    
	}

}
