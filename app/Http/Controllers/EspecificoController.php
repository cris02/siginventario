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
		$especificos = DB::table('especificos')->orderBy('id','asc')->get();
		//return view('.especifico.index',['especificos' => $especificos]);
		return view('especifico\index')->with('especificos',$especificos);
	}
	
	public function create()
    {
        return view('especifico.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'numero_especifico' => 'required',
			'titulo_especifico' => 'required',
			'descripcion_especifico' => 'required',
		]);
		
		    //valida si exite el especifico antes de guardar
			if(DB::table('especificos')->where('id',$request->input('numero_especifico'))->first()){
				Session::flash('flash_message', 'Especifico ya existe!');
				return redirect()->back()->with('success','Especifico ya existe');
			}else{
				Especifico::create([
		           'id' =>$request->input('numero_especifico'),
		           'titulo_especifico' =>$request->input('titulo_especifico'),
		           'descripcion_epecifico' =>$request->input('descripcion_especifico')
		        ]);
		        return redirect()->route('especifico.index')->with('success','Especifico creado exitosamente');
		}
	     
    }

    public function show($id)
    {
       $especifico = DB::table('especificos')->where('id',$id)->first();
	   return view('especifico.details')->with('especifico',$especifico);
    }

    public function edit($id)
    {
       $especifico = DB::table('especificos')->where('id',$id)->first();
	   return view('especifico.edit')->with('especifico',$especifico); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
		   'titulo_especifico'=>'required'
		]);
		$especifico = Especifico::FindOrFail($id);
		if($especifico){
			$especifico ->update([
			  'titulo_especifico' => $request->input('titulo_especifico'), 
			  'descripcion_epecifico' =>$request->input('descripcion_especifico')
			]);
		return redirect()->route('especifico.index')->with('success','Especifico actualizado exitosamente');
			
		}else{
			return redirect()->route('especifico.index')->with('success','Error al actualizar especifico');
		}
				    
    }
    
	public function delete($id){
		$especifico = DB::table('especificos')->where('id',$id)->first();
		
	    return view('especifico.delete')->with('especifico',$especifico);
		
		
	}
    
    public function destroy($id)
    {
        DB::table('especificos')->where('id',$id)->delete();
		return redirect()->route('especifico.index');
    }
}
