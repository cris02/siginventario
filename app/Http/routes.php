<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
       return view('Auth.login');
   });

   


	//rutas para usuarios

Route::get('login','UsersController@showLoginForm');
Route::post('login','UsersController@authenticate');
Route::get('logout','UsersController@logout');
Route::get('register','UsersController@getRegister');
Route::post('register','UsersController@postRegister');
Route::get('{id}/edit','UsersController@getEdit');
Route::get('usuario/create/{id}','UsersController@create');
Route::resource('usuario','UsersController');



Route::group(['middleware'=>'admin_sistema'],function(){
	Route::resource('roles','RolesController');
});

//ruta hacia home
Route::get('home', 'HomeController@index');
//rutas para proveedor
Route::get('proveedor/detail/{id}', 'Article\ProviderController@detail');
Route:: resource('proveedor','Article\ProviderController');
//rutas para departamento
Route::resource('departamento', 'Departamento\DepartmentController');
//rutas para especifico
Route::resource('especifico','EspecificoController');
Route::get('especifico/delete/{id}','EspecificoController@delete')->name('yes');
//rutas para unidad de medida
Route::resource('unidad','UnidadMedidaController');
Route::get('unidad/delete/{id_unidad_medida}','UnidadMedidaController@delete')->name('delete_unidad');
//rutas para articulo
Route::resource('articulo','ArticuloController');
Route::get('articulo/delete/{codigoArticulo}','ArticuloController@delete')->name('delete_articulo');
//rutas para ingreso
Route::resource('ingreso','IngresoController');
Route::get('ingreso/delete/{idIngreso}','IngresoController@delete')->name('delete_ingreso');

Route::get('ingreso/addExistencia/{codProducto}/{idPresentacion}','IngresoController@addExistencia')->name('addExistencia');

Route::resource('observacion','ObservacionController');
Route::get('observacion/delete/{idObservacion}','ObservacionController@delete')->name('delete_observacion');
/*
Route::resource('roles','RolesController'); 
*/

Route::resource('existencia','ExistenciaController');
//Route::resource('existencia/index/{buscar?}','ExistenciaController@index');

Route::resource('presentacion','PresentacionController');

//rutas para observacion
Route::resource('observacion','ObservacionController');
Route::get('observacion/delete/{idObservacion}','ObservacionController@delete')->name('delete_observacion');
//rutas para roles
Route::resource('roles','RolesController');

//requisicion
//ver la requisicion que se esta creando
Route::get('requisicion/ver',[
		'as'=>'requisicion-show',
		'uses'=>'RequisicionController@ver'
	]);
//agregar articulo a la requisicion
Route::get('requisicion/add/{cod}/{cantidad}','RequisicionController@add');

//eliminar articulo de la requisicion
Route::get('requisicion/delete/{cod}',[
		'as'=>'requisicion-delete',
		'uses'=>'RequisicionController@delete'
	]);
//eliminar la requisicion que se esta creando
Route::get('requisicion/trash',[
		'as'=>'requisicion-trash',
		'uses'=>'RequisicionController@trash'
	]);
//actualizar cantidad en articulo de la requisicion
Route::get('requisicion/update/{cod}/{cantidad}','RequisicionController@update');
//almacenar la requisicion
Route::get('requisicion/store','RequisicionController@store');


// detalle requisicion
 //para todo el controlador
Route::resource('detalle_requisicion','DetalleRequisicionController');



Route::get('presentacion/delete/{idPresentacion}','PresentacionController@delete')->name('delete_presentacion');
Route::get('articulo/addPresentacion/{codProducto}','ArticuloController@addPresentacion')->name('addPresentacion');













