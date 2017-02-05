<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;
use DB;
use Session;
use sig\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
		$unidades = UnidadMedida::orderBy('nombre_unidadmedida','asc')->get();		
		return view('unidadmedida.index',['unidades'=>$unidades]);
	}
	
	public function create()
    {
        return view('unidadmedida.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'nombre_unidadmedida' => 'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:unidad_medida,nombre_unidadmedida',			
		]);
		
		UnidadMedida::create([
		           'nombre_unidadmedida' =>$request->input('nombre_unidadmedida')
		           ]);
		flash('Unidad de medida guardada exitosamente','success');	   
		return redirect()->route('unidad.index');
	     
    }

    public function show($idUnidadMedida)
    {
       $unidad = UnidadMedida::findOrFail($idUnidadMedida);	   
	   return view('unidadmedida.details',['unidad'=>$unidad]);
	}    
 
    public function edit($idUnidadMedida)
	{
       $unidad = UnidadMedida::findOrFail($idUnidadMedida);
	   return view('unidadmedida.edit',['unidad'=>$unidad]); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
		   'nombre_unidadmedida'=>'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:unidad_medida,nombre_unidadmedida,'.$id.',id_unidad_medida'
		]);
		$unidad = UnidadMedida::FindOrFail($id);
		if($unidad){
			$unidad ->update([
			  'nombre_unidadmedida' => $request->input('nombre_unidadmedida')
			  ]);
	    flash('Unidad de medida actualizado exitosamente','success');
		return redirect()->route('unidad.index');			
		}else{
			flash('Error: no se pudo actualizar la unidad de medida','danger');
			return redirect()->route('unidad.index');
		}
				    
    }
    
	public function delete($idUnidadMedida){
			$unidad =UnidadMedida::findOrFail($idUnidadMedida);
			return view('unidadmedida.delete',['unidad'=>$unidad]);
		}
    
    public function destroy($idUnidadMedida)
    {
        $unidad = UnidadMedida::findOrFail($idUnidadMedida);
		if($unidad->articulo->count()>0){			
			flash('Error: No puede eliminarse la unidad de medida porque esta siendo usada por articulos','danger');
			return redirect()->back();
		}else{
			$unidad->delete();
			flash('Unidad de medida eliminada exitosamente','success');
		    return redirect()->route('unidad.index');
    }
	
}
}

