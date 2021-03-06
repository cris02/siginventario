<?php

namespace sig\Http\Controllers;
use Illuminate\Http\Request;
use sig\Http\Requests;
use DB;
use Session;
use sig\Models\Articulo;
use sig\Models\UnidadMedida;
use sig\Models\Presentacion;
use sig\Models\GenerarCodigo;
use sig\Models\Especifico;

class ArticuloController extends Controller
{ 
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    
    public function index(){
		$articulos = Articulo::orderBy('nombre_articulo','asc')->get();		
		return view('articulos.index',['articulos'=>$articulos]);
	}
	
	public function addPresentacion($codProducto){
		$articulo = Articulo::findOrFail($codProducto);
		$presentaciones = Presentacion::orderBy('presentacion')->get();
		return view('articulos.addPresentacion',['articulo'=>$articulo,'presentaciones'=>$presentaciones]);
	}
	
	public function create()
    {
		$unidades = UnidadMedida::orderBy('nombre_unidadmedida','asc')->get();
		$especificos = Especifico::orderBy('id','asc')->get();
        return view('articulos.create',['unidades'=>$unidades, 'especificos'=>$especificos]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
		    
			'unidad' => 'required | integer|min:1',
			'especifico' => 'required |integer | digits:5|min:1| exists:especificos,id',

			'nombre' => 'required |regex: /^[a-zA-Z0-9������\s\/]*$/ |unique:articulo,nombre_articulo'
		]);
        
        $articulos =Articulo::where([
                    ['id_especifico', '=',$request->input('especifico')]               
                    ])->get();
        $codigo = GenerarCodigo::getCodigo($articulos,$request->input('especifico'),$request->input('nombre'));					
											
				    Articulo::create([
				        'codigo_articulo' =>$codigo,		    
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
		   'nombre'=>'required |regex: /^[a-zA-Z0-9������\s\/]*$/ |unique:articulo,nombre_articulo,'.$codigoArticulo.',codigo_articulo',
		   'unidad' => 'required | integer |min:1',
		   'especifico' => 'required |digits:5 |min:1| exists:especificos,id'
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
