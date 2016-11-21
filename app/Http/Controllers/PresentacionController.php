<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;

use sig\Models\Presentacion;

class PresentacionController extends Controller
{
    public function index(){
		$presentaciones = Presentacion::orderBy('presentacion','asc')->get();
		
		return view('presentacion.index',['presentaciones'=>$presentaciones]);
	}
	
	
	public function create()
    {
        return view('presentacion.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[		    
			'presentacion' => 'required|regex: /^[a-zA-Za??s??\s]*$/ |unique:presentacion,presentacion',			
		]);		
		    
				Presentacion::create([		           
		           'presentacion' =>$request->input('presentacion'),		           
		        ]);
				flash('Presentacion guardado exitosamente','success');
		        return redirect()->route('presentacion.index');		
	     
    }

    public function show($id)
    {
       $presentacion = Presentacion::findOrFail($id);
	   return view('presentacion.details',['presentacion'=>$presentacion]);
    }

    public function edit($id)
    {
       $presentacion = Presentacion::findOrFail($id);
	   return view('presentacion.edit',['presentacion'=>$presentacion]); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
		   'presentacion'=>'required |regex: /^[a-zA-Za0-9??s??\s]*$/ | unique:presentacion,presentacion,'.$id.',id_pres'
		]);
		$presentacion = Presentacion::FindOrFail($id);
		if($presentacion){
			$presentacion ->update([
			  'presentacion' => $request->input('presentacion'), 			  
			]);
		flash('Presentacion actualizado exitosamente','success');
		return redirect()->route('presentacion.index');
			
		}else{
			flash('Error:No se encontro ninguna Presentacion','danger');
			return redirect()->route('presentacion.index');
		}
				    
    }
    
	public function delete($id){
		$presentacion = Presentacion::findOrFail($id);
		
	    return view('presentacion.delete',['presentacion'=>$presentacion]);
		
		
	}
    
    public function destroy($id)
    {
        $presentacion = Presentacion::findOrFail($id);
		if($presentacion->existencia->count()>0){
			flash('Error: no puede eliminarse la presentacion porque hay articulos que lo estan usando','danger');
			return redirect()->back();
		}else{
            $presentacion->delete();
		    flash('Presentacion eliminada exitosamente','success');
		    return redirect()->route('presentacion.index');
		}
    }
}
