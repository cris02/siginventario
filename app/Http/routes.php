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



//rutas para usuarios
Route::get('/', 'UsersController@showLoginForm');
Route::post('login','UsersController@authenticate');
Route::get('logout','UsersController@logout');

Route::get('usuario','UsersController@index');
Route::get('register','UsersController@getRegister');
Route::post('register','UsersController@postRegister');
Route::get('{id}/edit','UsersController@getEdit');
Route::post('edit','UsersController@postEdit');

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














