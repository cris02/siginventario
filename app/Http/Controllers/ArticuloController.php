<?php

namespace sig\Http\Controllers;
use Illuminate\Http\Request;
use sig\Http\Requests;
use DB;
use Session;
use sig\Models\Articulo;
use sig\Models\UnidadMedida;

class ArticuloController extends Controller
{
    public function index(){
		$articulos = DB::table('articulo')->orderBy('nombre_articulo','asc')->get();
		
		return view('articulos.index')->with('articulos',$articulos);
	}
	
	public function create()
    {
		$unidades = DB::table('unidad_medida')->orderBy('nombre_unidadmedida','asc')->get();
        return view('articulos.create')->with('unidades',$unidades);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'codigo' => 'required | alpha_num',
			'unidad' => 'required | integer',
			'especifico' => 'required | digits:4',
			'nombre' => 'required | unique:articulo,nombre_articulo'
		]);
		
		    //valida si exite el nombre del producto antes de guardar
			if(DB::table('articulo')->where('nombre_articulo',$request->input('nombre'))->first()){
				//Session::flash('flash_message', 'Unidad de medida ya existe!');
				return redirect()->back()->with('error','Articulo ya existe');
			}else{
				$especifico = DB::table('especificos')->where('id',$request->input('especifico'))->first();
				if($especifico){
				    Articulo::create([
				        'codigo_articulo' =>$request->input('codigo'),		    
		                'nombre_articulo' =>$request->input('nombre'),
				        'id_unidad_medida' =>$request->input('unidad'),
				        'id_especifico' =>$request->input('especifico')				  				   
				    ]);
		            return redirect()->route('articulo.index')->with('success','Articulo creado exitosamente');
				}else{
					return redirect()->back()->with('error','Especifco ya existe');
				}
		    }
	}

    public function show($codigoArticulo)
    {
       $articulo = DB::table('articulo')->where('codigo_articulo',$codigoArticulo)->first();
	   
	   return view('articulos.details')->with('articulo',$articulo);
	}
    
 
    public function edit($codigoArticulo)
	{
       $articulo = DB::table('articulo')->where('codigo_articulo',$codigoArticulo)->first();
	   $unidades = DB::table('unidad_medida')->orderBy('nombre_unidadmedida','asc')->get();
	   //return view('articulos.edit')->with('articulo',$articulo); 
	   return view('articulos.edit',['articulo' => $articulo,'unidades' =>$unidades]);
    }

    public function update(Request $request, $codigoArticulo)
    {
        $this->validate($request,[
		   'nombre'=>'required | unique:articulo,nombre_articulo',
		   'unidad' => 'required | integer',
		   'especifico' => 'required |digits:4'
		]);
		$articulo = Articulo::FindOrFail($codigoArticulo);
		if($articulo){
			$articulo->update([
			  'nombre_articulo' => $request->input('nombre'),
			  'id_unidad_medida' => $request->input('unidad'),
			  'id_especifico' => $request->input('especifico')
			  ]);
		return redirect()->route('articulo.index')->with('success','Articulo actualizado exitosamente');
			
		}else{
			return redirect()->route('articulo.index')->with('error','Error al actualizar Articulo');
		}
				    
    }
    
	public function delete($codigoArticulo){
		$articulo = DB::table('articulo')->where('codigo_articulo',$codigoArticulo)->first();
	   
	    return view('articulos.delete')->with('articulo',$articulo);
		
		
	}
    
    public function destroy($codigoArticulo)
    {
        DB::table('articulo')->where('codigo_articulo',$codigoArticulo)->delete();
		return redirect()->route('articulo.index')->with('success','Articulo eliminado correctamente');
    }
}
