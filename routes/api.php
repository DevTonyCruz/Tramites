<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'list'], function () {
    Route::get('users','UsersController@list')->name('users.list');
    Route::get('gestion','GestionController@list')->name('gestion.list');
    Route::get('remitente','RemitenteController@list')->name('remitente.list');
    Route::get('tramites','TramitesController@list')->name('tramites.list');
    Route::get('estatus','EstatusController@list')->name('estatus.list');

    Route::get('grupos','GruposController@list')->name('grupos.list');
    Route::get('profesiones','ProfesionesController@list')->name('profesiones.list');
    Route::get('fechas','FechasController@list')->name('fechas.list');
});
