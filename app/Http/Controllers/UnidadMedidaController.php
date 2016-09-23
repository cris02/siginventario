<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;
use DB;
use Session;
use sig\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
    public function index(){
		$unidades = DB::table('unidad_medida')->orderBy('nombre_unidadmedida','asc')->get();
		
		return view('unidadmedida.index')->with('unidades',$unidades);
	}
	
	public function create()
    {
        return view('unidadmedida.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'nombre_unidadmedida' => 'required|unique:unidad_medida,nombre_unidadmedida',
			
		]);
		
		    //valida si exite el especifico antes de guardar
			/*if(DB::table('unidad_medida')->where('nombre_unidadmedida',$request->input('nombre_unidadmedida'))->first()){
				//Session::flash('flash_message', 'Unidad de medida ya existe!');
				return redirect()->back()->with('error','Unidad de medida ya existe');
			}else{
				UnidadMedida::create([
		           'nombre_unidadmedida' =>$request->input('nombre_unidadmedida')
		           ]);
		        return redirect()->route('unidad.index')->with('success','Unidad de medida creado exitosamente');
		} */
		UnidadMedida::create([
		           'nombre_unidadmedida' =>$request->input('nombre_unidadmedida')
		           ]);
		        return redirect()->route('unidad.index')->with('success','Unidad de medida creado exitosamente');
	     
    }

    public function show($id)
    {
       $unidad = DB::table('unidad_medida')->where('id_unidad_medida',$id)->first();
	   
	   return view('unidadmedida.details')->with('unidad',$unidad);
	}
    
 
    public function edit($id)
	{
       $unidad = DB::table('unidad_medida')->where('id_unidad_medida',$id)->first();
	   return view('unidadmedida.edit')->with('unidad',$unidad); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
		   'nombre_unidadmedida'=>'required|unique:unidad_medida,nombre_unidadmedida'
		]);
		$unidad = UnidadMedida::FindOrFail($id);
		if($unidad){
			$unidad ->update([
			  'nombre_unidadmedida' => $request->input('nombre_unidadmedida')
			  ]);
		return redirect()->route('unidad.index')->with('success','Unidad de medida actualizado exitosamente');
			
		}else{
			return redirect()->route('unidad.index')->with('error','Error al actualizar unidad de medida');
		}
				    
    }
    
	public function delete($id){
		$unidad = DB::table('unidad_medida')->where('id_unidad_medida',$id)->first();
		
	    return view('unidadmedida.delete')->with('unidad',$unidad);
		
		
	}
    
    public function destroy($id)
    {
        DB::table('unidad_medida')->where('id_unidad_medida',$id)->delete();
		return redirect()->route('unidad.index')->with('success','Unidad de medida eliminada correctamente');
    }
	
}
