<?php

Route::get('/', 'TestController@welcome');
Route::get('/manual', 'TestController@manual'); //descargar manual

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home'); //VER PROYECTOS

Route::get('/user', 'HomeController@password'); // formulario contraceña
Route::post('/updatepassword', 'HomeController@updatePassword'); // formulario contraceña

Route::get('/create', 'HomeController@create'); //formulario
Route::post('/home', 'HomeController@store'); //registrar los datos del form en la bd.

Route::group(['middleware' => 'owner'], function () {
Route::get('/{project_id}/alternativas', 'AlternativasController@index'); //formulario
Route::get('/{project_id}/alternativas/create', 'AlternativasController@create'); //formulario
Route::post('/{project_id}/ba', 'AlternativasController@delete'); //borrar alternativa
});
Route::get('/reporte', 'AlternativasController@rpt'); //registrar los datos del form en la bd

//VALIDADO EL MIDDLEWARE DESDE EL CONTROLADOR
Route::get('/rpt/{id}', 'AlternativasController@rptCreate'); //registrar los datos del form en bd.

Route::get('/rpt/{id}/{letra}', 'AlternativasController@letra');
Route::post('/rpt/{id}/{letra}/add', 'AlternativasController@letradd');
Route::post('/rpt/{id}/{letra}/{e}', 'AlternativasController@letrae');



Route::post('//rpt', 'AlternativasController@rptPost'); //registrar los datos del form en la bd.

//POLITICAS,PLANES, PROGRAMAS
Route::get('/ppp/', 'PppController@index');
Route::get('/ppp/{inem}', 'PppController@inem');
Route::post('/ppp/{inem}', 'PppController@store');
Route::post('/ppp/{id}/delete', 'PppController@destroy');
Route::group(['middleware' => 'owner'], function () {
	Route::get('/{project_id}/eview', 'HomeController@edit'); //formulario de edicion
	Route::post('/{project_id}/eview', 'HomeController@update'); //actualizar
	Route::post('/{project_id}/delete', 'HomeController@destroy'); //delete
});
Route::group(['middleware' => 'owner'], function () {
	Route::get('/{project_id}/characteristic', 'CharacteristicController@index'); //ver caracteristicas
	Route::post('/{project_id}/characteristic', 'CharacteristicController@store'); //Crear caracteristica
	Route::post('/{project_id}/characteristic/{characteristic_id}/delete', 'CharacteristicController@destroy'); //Eliminar caracteristicas.

	Route::get('/{project_id}/characteristic/{characteristic_id}/elements', 'ElementController@index');//ver elementos

	Route::post('/{project_id}/characteristic/{characteristic_id}/elements', 'ElementController@store');//registrar elementos
	Route::post('/{project_id}/characteristic/{characteristic_id}/{element_id}/delete', 'ElementController@destroy'); //Eliminar elemento.

	Route::get('/{project_id}/diagram', 'DiagramController@index');//ver diagrama

	Route::get('/{project_id}/table', 'TableController@index'); //ver tabla
	Route::get('/{project_id}/table/{element_id}/form', 'TableController@edit');
	Route::post('/{project_id}/table/{element_id}/form', 'TableController@update'); //ver tabla

	Route::get('/{project_id}/svg', 'SvgController@index');
	Route::post('/{project_id}/svg', 'SvgController@downloadsvg');
	Route::post('/{project_id}/svgu', 'SvgController@store'); //CARGAR
	Route::post('/{project_id}/svgd', 'SvgController@delete'); //ELIMINAR
	Route::get('/{project_id}/uploads/{ruta}', 'SvgController@save');

});
});
