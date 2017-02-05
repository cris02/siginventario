<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Models\Especifico;
use DB;
use Session;


class EspecificoController extends Controller
{   
	public function __construct()
    {
        $this->middleware('auth');
    }
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
		    'numero' => 'required |integer|min:1|digits:5 |unique:especificos,id',
			'titulo' => 'required|regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:especificos,titulo_especifico',
			
		]);		
		    
				Especifico::create([
		           'id' =>$request->input('numero'),
		           'titulo_especifico' =>$request->input('titulo'),
		           'descripcion_epecifico' =>$request->input('descripcion')
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
		   'titulo'=>'required |regex: /^[a-zA-Záéíóúñ\s]*$/ | unique:especificos,titulo_especifico,'.$id.',id'
		]);
		$especifico = Especifico::FindOrFail($id);
		if($especifico){
			$especifico ->update([
			  'titulo_especifico' => $request->input('titulo'), 
			  'descripcion_epecifico' =>$request->input('descripcion')
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
