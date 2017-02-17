<?php


Route::get('/', function () {
       return view('Auth.login');
   });


	//rutas para usuarios

Route::get('login','UsersController@showLoginForm');
Route::post('login','UsersController@authenticate');
Route::get('logout','UsersController@logout');
Route::get('register','UsersController@getRegister');
Route::post('register','UsersController@postRegister');
Route::get('usuario/create/{id}','UsersController@create');
Route::resource('usuario','UsersController');


Route::group(['middleware'=>['auth','admin_sistema']],function(){
	//ruta para los roles
	Route::resource('roles','RolesController');
    //rutas de usuarios q solo puede acceder el admin
	Route::get('user/{id}',['as'=>'usuario-eliminar','uses'=>'UsersController@mostrar']);
	Route::get('{id}/edit','UsersController@getEdit');
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


Route::resource('existencia','ExistenciaController');

Route::resource('presentacion','PresentacionController');

//rutas para observacion
Route::resource('observacion','ObservacionController');
Route::get('observacion/delete/{idObservacion}','ObservacionController@delete')->name('delete_observacion');


//requisicion
//ver la requisicion que se esta creando
Route::get('requisicion/crear',[
		'as'=>'requisicion-show',
		'uses'=>'RequisicionController@crear'
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
Route::get('requisicion/listar',[
	'as'=>'requisicion-listar',
	'uses'=>'RequisicionController@index'
	]);

// detalle requisicion
 //para todo el controlador
Route::resource('requisicion/detalle','DetalleRequisicionController');
//aprobar la requisicion (por el administrador financiero)
Route::get('requisicion/detalle/aprobar/{id}','DetalleRequisicionController@aprobar');
//imprimir requisicion
Route::get('requisicion/imprimir/{id}','DetalleRequisicionController@imprimir');
Route::get('requisicion/observacion/{id}',[
	'as'=>'requisicion-observacion',
	'uses'=>'DetalleRequisicionController@observacion'
	]);















