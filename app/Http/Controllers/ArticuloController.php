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
		$articulos = Articulo::orderBy('nombre_articulo','asc')->get();		
		return view('articulos.index',['articulos'=>$articulos]);
	}
	
	public function create()
    {
		$unidades = UnidadMedida::orderBy('nombre_unidadmedida','asc')->get();
        return view('articulos.create',['unidades'=>$unidades]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    'codigo' => 'required | alpha_num',
			'unidad' => 'required | integer|min:1',
			'especifico' => 'required | digits:5|min:1| exists:especificos,id',
			'nombre' => 'required |regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:articulo,nombre_articulo'
		]);	    
											
				    Articulo::create([
				        'codigo_articulo' =>$request->input('codigo'),		    
		                'nombre_articulo' =>$request->input('nombre'),
				        'id_unidad_medida' =>$request->input('unidad'),
				        'id_especifico' =>$request->input('especifico')				  				   
				    ]);
					flash('Articulo guardado exitosamente','success');
		            return redirect()->route('articulo.index');
				
		    
	}

    public function show($codigoArticulo)
    {
       $articulo = Articulo::findOrFail($codigoArticulo);	   
	   return view('articulos.details',['articulo'=>$articulo]);
	}    
 
    public function edit($codigoArticulo)
	{
       $articulo = Articulo::findOrFail($codigoArticulo);
	   $unidades = UnidadMedida::orderBy('nombre_unidadmedida','asc')->get();
	   
	   return view('articulos.edit',['articulo' => $articulo,'unidades' =>$unidades]);
    }

    public function update(Request $request, $codigoArticulo)
    {
        $this->validate($request,[
		   'nombre'=>'required |regex: /^[a-zA-Záéíóúñ\s]*$/ |unique:articulo,nombre_articulo,'.$codigoArticulo.',codigo_articulo',
		   'unidad' => 'required | integer |min:1',
		   'especifico' => 'required |digits:4 |min:1| exists:especificos,id'
		]);
		$articulo = Articulo::FindOrFail($codigoArticulo);
		if($articulo){
			$articulo->update([
			  'nombre_articulo' => $request->input('nombre'),
			  'id_unidad_medida' => $request->input('unidad'),
			  'id_especifico' => $request->input('especifico')
			  ]);
	    flash('Articulo actualizado exitosamente','success');
		return redirect()->route('articulo.index');
			
		}else{
			flash('Error a la actualizar articulo','danger');
			return redirect()->route('articulo.edit');
		}
				    
    }
    
	public function delete($codigoArticulo){
		$articulo = Articulo::findOrFail($codigoArticulo);
	   
	    return view('articulos.delete',['articulo'=>$articulo]);		
	}
    
    public function destroy($codigoArticulo)
    {
        Articulo::findOrFail($codigoArticulo)->delete();
		flash('Articulo eliminado exitosamente','success');
		return redirect()->route('articulo.index');
    }
}
