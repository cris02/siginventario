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




Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route:: resource('menu','Menu\MenuController');

Route::get('proveedor/detail/{id}', 'Article\ProviderController@detail');
Route:: resource('proveedor','Article\ProviderController');

Route::post('departamento/store', 'Departamento\DepartmentController@store');
Route::resource('departamento', 'Departamento\DepartmentController');

Route::resource('especifico','EspecificoController');
Route::get('especifico/delete/{id}','EspecificoController@delete')->name('yes');

Route::resource('unidad','UnidadMedidaController');
Route::get('unidad/delete/{id_unidad_medida}','UnidadMedidaController@delete')->name('delete_unidad');

Route::resource('articulo','ArticuloController');
Route::get('articulo/delete/{codigoArticulo}','ArticuloController@delete')->name('delete_articulo');

Route::resource('ingreso','IngresoController');
Route::get('ingreso/delete/{idIngreso}','IngresoController@delete')->name('delete_ingreso');

Route::resource('observacion','ObservacionController');
Route::get('observacion/delete/{idObservacion}','ObservacionController@delete')->name('delete_observacion');













