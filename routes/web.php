<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/',             'UsersController@index')->name('users.index');
    Route::get('/create',       'UsersController@create')->name('users.create');
    Route::post('/',            'UsersController@store')->name('users.store');
    Route::get('/{id}',         'UsersController@edit')->name('users.edit');
    Route::put('/{id}',         'UsersController@update')->name('users.update');
    Route::delete('/{id}',      'UsersController@destroy')->name('users.destroy');
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function () {
    Route::get('/',                 'RolesController@index')->name('roles.index');
    Route::get('/create',           'RolesController@create')->name('roles.create');
    Route::post('/',                'RolesController@store')->name('roles.store');
    Route::get('/{id}',             'RolesController@show')->name('roles.show');
    Route::get('/{id}/edit',        'RolesController@edit')->name('roles.edit');
    Route::put('/{id}',             'RolesController@update')->name('roles.update');
    Route::delete('/{id}',          'RolesController@destroy')->name('roles.destroy');
    Route::put('/status/{id}',      'RolesController@status')->name('roles.status');
    Route::get('/permission/{id}',  'RolesController@permission')->name('roles.permission');
    Route::put('/permission/{id}',  'RolesController@save_permission')->name('roles.savePermission');
});


Route::group(['prefix' => 'remitente', 'middleware' => ['auth']], function () {
    Route::get('/',             'RemitenteController@index')->name('remitente.index');
    Route::get('/create',       'RemitenteController@create')->name('remitente.create');
    Route::post('/',            'RemitenteController@store')->name('remitente.store');
    Route::get('/{id}',         'RemitenteController@edit')->name('remitente.edit');
    Route::put('/{id}',         'RemitenteController@update')->name('remitente.update');
    Route::delete('/{id}',      'RemitenteController@destroy')->name('remitente.destroy');
});

Route::group(['prefix' => 'gestion', 'middleware' => ['auth']], function () {
    Route::get('/',             'GestionController@index')->name('gestion.index');
    Route::get('/create',       'GestionController@create')->name('gestion.create');
    Route::post('/',            'GestionController@store')->name('gestion.store');
    Route::get('/{id}',         'GestionController@edit')->name('gestion.edit');
    Route::put('/{id}',         'GestionController@update')->name('gestion.update');
    Route::delete('/{id}',      'GestionController@destroy')->name('gestion.destroy');
});

Route::group(['prefix' => 'tramites', 'middleware' => ['auth']], function () {
    Route::get('/',             'TramitesController@index')->name('tramites.index');
    Route::get('/create',       'TramitesController@create')->name('tramites.create');
    Route::post('/',            'TramitesController@store')->name('tramites.store');
    Route::get('/{id}',         'TramitesController@edit')->name('tramites.edit');
    Route::put('/{id}',         'TramitesController@update')->name('tramites.update');
    Route::delete('/{id}',      'TramitesController@destroy')->name('tramites.destroy');
    Route::post('/export',      'TramitesController@export')->name('tramites.export');
});

Route::group(['prefix' => 'sepomex', 'middleware' => ['auth']], function () {
    Route::post('/get-states',                      'SepomexController@get_states')->name('sepomex.getStates');
    Route::post('/get-location-by-state',           'SepomexController@get_location_by_state')->name('sepomex.getLocationByState');
    Route::post('/get-colonies-by-location-state',  'SepomexController@get_colonies_by_location_state')->name('sepomex.getColoniesByLocationState');
    Route::post('/get-zip-code',                    'SepomexController@get_zip_code')->name('sepomex.getZipCode');
    Route::post('/get-search-zip-code',             'SepomexController@get_search_zip_code')->name('sepomex.getSearchZipCode');
});

Route::group(['prefix' => 'grupos', 'middleware' => ['auth']], function () {
    Route::get('/',                 'GruposController@index')->name('grupos.index');
    Route::get('/create',           'GruposController@create')->name('grupos.create');
    Route::post('/',                'GruposController@store')->name('grupos.store');
    Route::get('/{id}',             'GruposController@edit')->name('grupos.edit');
    Route::put('/{id}',             'GruposController@update')->name('grupos.update');
    Route::delete('/{id}',          'GruposController@destroy')->name('grupos.destroy');
    Route::put('/status/{id}',      'GruposController@status')->name('grupos.status');
});

Route::group(['prefix' => 'profesiones', 'middleware' => ['auth']], function () {
    Route::get('/',                 'ProfesionesController@index')->name('profesiones.index');
    Route::get('/create',           'ProfesionesController@create')->name('profesiones.create');
    Route::post('/',                'ProfesionesController@store')->name('profesiones.store');
    Route::get('/{id}',             'ProfesionesController@edit')->name('profesiones.edit');
    Route::put('/{id}',             'ProfesionesController@update')->name('profesiones.update');
    Route::delete('/{id}',          'ProfesionesController@destroy')->name('profesiones.destroy');
    Route::put('/status/{id}',      'ProfesionesController@status')->name('profesiones.status');
});

Route::group(['prefix' => 'fechas', 'middleware' => ['auth']], function () {
    Route::get('/',                 'FechasController@index')->name('fechas.index');
    Route::get('/create',           'FechasController@create')->name('fechas.create');
    Route::post('/',                'FechasController@store')->name('fechas.store');
    Route::get('/{id}',             'FechasController@edit')->name('fechas.edit');
    Route::put('/{id}',             'FechasController@update')->name('fechas.update');
    Route::delete('/{id}',          'FechasController@destroy')->name('fechas.destroy');
    Route::put('/status/{id}',      'FechasController@status')->name('fechas.status');
});
