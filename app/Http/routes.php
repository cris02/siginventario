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





Route::group(['middleware'=>['web']], function(){

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route:: resource('menu','Menu\MenuController');
Route:: resource('articulo','Article\ArticleController');

Route:: resource('proveedor','Article\ProviderController');


});
Route::group(['middleware'=>['web']], function(){

	Route::get('home', 'HomeController@index');
	Route:: resource('menu','Menu\MenuController');
	Route:: resource('articulo','Article\ArticleController');

	Route::post('departamento/store', 'Article\DepartmentController@store');
	Route::resource('departamento', 'Article\DepartmentController');
	
});


