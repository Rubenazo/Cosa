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

Route::get('usuario','UsuariosController@formusuario')->before('auth');
Route::post('usuario','UsuariosController@crearusuario');

Route::get('lista','ListaController@mostrarusuarios')->before('auth');

Route::get('pago/{id}','ListaController@pagar')->before('auth');
Route::get('banco','ListaController@seleccionar');

Route::post('login','RegistroController@login');
Route::get('logout','RegistroController@logout')->before('auth');
?>