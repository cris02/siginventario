<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Models\Especifico;
use DB;
use Session;


class EspecificoController extends Controller
{
    //lista los especificos
	public function index(){
		$especificos = Especifico::orderBy('id','asc')->get();
		
		return view('especifico.index',['especificos'=>$especificos]);
	}
	
	public function create()
    {
        return view('especifico.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'numero_especifico' => 'required |digits:4 |unique:especificos,id',
			'titulo_especifico' => 'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:especificos,titulo_especifico',
			'descripcion_especifico' => 'required',
		]);		
		    
				Especifico::create([
		           'id' =>$request->input('numero_especifico'),
		           'titulo_especifico' =>$request->input('titulo_especifico'),
		           'descripcion_epecifico' =>$request->input('descripcion_especifico')
		        ]);
				flash('Especifico guardado exitosamente','success');
		        return redirect()->route('especifico.index');		
	     
    }

    public function show($id)
    {
       $especifico = Especifico::findOrFail($id);
	   return view('especifico.details',['especifico'=>$especifico]);
    }

    public function edit($id)
    {
       $especifico = Especifico::findOrFail($id);
	   return view('especifico.edit',['especifico'=>$especifico]); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
		   'titulo_especifico'=>'required |regex: /^[a-zA-Záéíóúñ\s]*$/ | unique:especificos,titulo_especifico,'.$id.',id'
		]);
		$especifico = Especifico::FindOrFail($id);
		if($especifico){
			$especifico ->update([
			  'titulo_especifico' => $request->input('titulo_especifico'), 
			  'descripcion_epecifico' =>$request->input('descripcion_especifico')
			]);
		flash('Especifico actualizado exitosamente','success');
		return redirect()->route('especifico.index');
			
		}else{
			flash('Error:No se encontro ningun especifico','danger');
			return redirect()->route('especifico.index');
		}
				    
    }
    
	public function delete($id){
		$especifico = Especifico::findOrFail($id);
		
	    return view('especifico.delete',['especifico'=>$especifico]);
		
		
	}
    
    public function destroy($id)
    {
        $especifico = Especifico::findOrFail($id);
		if($especifico->articulo->count()>0){
			flash('Error: no puede eliminarse el especifico porque hay articulos que lo estan usando','danger');
			return redirect()->back();
		}else{
            $especifico->delete();
		    flash('Especifico eliminado exitosamente','success');
		    return redirect()->route('especifico.index');
		}
    }
}
