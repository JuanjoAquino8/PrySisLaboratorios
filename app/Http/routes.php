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

Route::get('/', 'WelcomeController@index');

Route::get('periodo', 'PeriodoController@index');
Route::get('periodo/crear', 'PeriodoController@crear');
Route::post('periodo/guardar', 'PeriodoController@guardar');
<<<<<<< HEAD
Route::get('periodo/{periodo}', 'PeriodoController@actualizar');
Route::delete('periodo/delete', 'PeriodoController@delete');
=======
Route::get('periodo/{id}/editar', 'PeriodoController@editar');
Route::post('periodo/actualizar', 'PeriodoController@actualizar');
Route::get('periodo/{id}/eliminar', 'PeriodoController@eliminar');
Route::post('periodo/eliminar', 'PeriodoController@eliminado');
>>>>>>> 391c83f297fa6f9b73cb5177f68affdb9bbc88e5
