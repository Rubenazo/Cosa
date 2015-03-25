<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('inicio');
});

Route::post('login','RegistroController@login');

Route::group(array('before' => 'auth'), function() {

	Route::get('usuario','UsuariosController@formusuario');
	Route::post('usuario','UsuariosController@crearusuario');

	Route::get('lista','ListaController@mostrarusuarios');
	Route::get('pago/{id}','ListaController@mostrarbancos');
	
	Route::get('banco','ListaController@seleccionar');
	Route::post('banco','ListaController@pagar');

	Route::get('logout','RegistroController@logout');
});


?>