<?php

namespace sig\Http\Controllers;

use Illuminate\Http\Request;

use sig\Http\Requests;
use sig\Models\Ingreso;
use sig\Models\Articulo;
use sig\Models\Article\Provider;
use sig\Models\Presentacion;
use DB;
use sig\Models\Existencia;

class IngresoController extends Controller
{
    public function index(){
		$ingresos = Ingreso::orderBy('id_ingreso','asc')->get();		
		return view('ingresos.index',['ingresos'=>$ingresos]);
	}
	
	public function addExistencia($codProducto,$idPresentacion){
		$proveedores = Provider::orderBy('nombre','asc')->get();
		$existencia =Existencia::where([
                    ['id_pres', '=',$idPresentacion],
                    ['codigo_articulo', '=', $codProducto],
])->first();
		return view('ingresos.addExistencia',['proveedores'=>$proveedores,'existencia'=>$existencia]); 
	}
	
	public function create()
    {
		
		$proveedores = Provider::orderBy('nombre','asc')->get();
		$presentaciones = Presentacion::orderBy('presentacion','asc')->get();
		$articulos = Articulo::orderBy('nombre_articulo','asc')->get();
        return view('ingresos.create',['proveedores'=>$proveedores,'articulos'=>$articulos,'presentaciones'=>$presentaciones]);
    }

    public function store(Request $request)
    {
       $this->validate($request,[
		    'presentacion' => 'required |integer | exists:presentacion,id_pres',		
			'producto' => 'required |alpha_num | exists:articulo,codigo_articulo',
			'proveedor' => 'required |integer | exists:providers,id',
			'fecha' => 'required',
			'cantidad' => 'required | integer|min:1',
			'precio' => 'required | numeric|min:0.00',
			
		]);	    
					$existencia =Existencia::where([
    ['id_pres', '=',$request->input('presentacion') ],
    ['codigo_articulo', '=', $request->input('producto')],
])->first();
                    if($existencia){
                    $existencia->ingresarExistencia($request->input('cantidad'),$request->input('precio'));
                     					
				    Ingreso::create([
				        		    
		                'id_art_pres' =>$existencia->id_art_pres,
				        'id_proveedor' =>$request->input('proveedor'),
				        'cantidad' =>$request->input('cantidad'),
                        'precio_unitario' =>$request->input('precio'),
                        'fecha_registro' =>$request->input('fecha'),
                        'existencia_ant' =>$existencia->existencia,
                        'precio' => $existencia->precio_unitario,						
				    ]);
					$existencia->update();
					flash('Ingreso guardado exitosamente','success');
					if($request->input('mostrar')=='ingresoindex'){
						return redirect()->route('ingreso.index');
					}else{
						return redirect()->route('existencia.index');
					}
		            
					}else{
						flash('Error:No existe la presentacion para este artculo,
						revise que los datos sean correctos,Si realmente necsita agregar
						existencia para este articulo y la presentacion puede crearla y luego agregar existencias','danger');						
		                return redirect()->back();
					}
				
		    
	}
	
	

    public function show($idIngreso)
    {
       $ingreso = Ingreso::findOrFail($idIngreso);	   
	   return view('ingresos.details',['ingreso'=>$ingreso]);
	}    
 
    public function edit($idIngreso)
	{
       $ingreso = Ingreso::findOrFail($idIngreso);
	   
	   
	   return view('articulos.edit');
    }

    public function update(Request $request, $codigoArticulo)
    {
       /* $this->validate($request,[
		   'nombre'=>'required |regex: /^[a-zA-Za??s??\s]*$/ |unique:articulo,nombre_articulo,'.$codigoArticulo.',codigo_articulo',
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
			flash('Error ala actualizar articulo','danger');
			return redirect()->route('articulo.edit');
		}
		*/		    
    }
    
	public function delete($idIngreso){
		$ingreso = Ingreso::findOrFail($idIngreso);
	   
	    return view('ingresos.delete',['ingreso'=>$ingreso]);		
	}
    
    public function destroy($idIngreso)
    {
        Articulo::findOrFail($idIngreso)->delete();
		flash('Ingreso eliminado exitosamente','success');
		return redirect()->route('ingreso.index');
    }
}
