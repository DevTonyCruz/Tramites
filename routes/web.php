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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function () {
    Route::get('/',             'UsersController@index')->name('users.index');
    Route::get('/create',       'UsersController@create')->name('users.create');
    Route::post('/',            'UsersController@store')->name('users.store');
    Route::get('/{id}',         'UsersController@edit')->name('users.edit');
    Route::put('/{id}',         'UsersController@update')->name('users.update');
    Route::delete('/{id}',      'UsersController@destroy')->name('users.destroy');
});

Route::group(['prefix' => 'roles'], function () {
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


Route::group(['prefix' => 'remitente'], function () {
    Route::get('/',             'RemitenteController@index')->name('remitente.index');
    Route::get('/create',       'RemitenteController@create')->name('remitente.create');
    Route::post('/',            'RemitenteController@store')->name('remitente.store');
    Route::get('/{id}',         'RemitenteController@edit')->name('remitente.edit');
    Route::put('/{id}',         'RemitenteController@update')->name('remitente.update');
    Route::delete('/{id}',      'RemitenteController@destroy')->name('remitente.destroy');
});

Route::group(['prefix' => 'gestion'], function () {
    Route::get('/',             'GestionController@index')->name('gestion.index');
    Route::get('/create',       'GestionController@create')->name('gestion.create');
    Route::post('/',            'GestionController@store')->name('gestion.store');
    Route::get('/{id}',         'GestionController@edit')->name('gestion.edit');
    Route::put('/{id}',         'GestionController@update')->name('gestion.update');
    Route::delete('/{id}',      'GestionController@destroy')->name('gestion.destroy');
});

Route::group(['prefix' => 'tramites'], function () {
    Route::get('/',             'TramitesController@index')->name('tramites.index');
    Route::get('/create',       'TramitesController@create')->name('tramites.create');
    Route::post('/beneficiario','TramitesController@beneficiario')->name('tramites.beneficiario');
    Route::post('/',            'TramitesController@store')->name('tramites.store');
    //Route::post('/',            'TramitesController@store')->name('tramites.store');
    Route::get('/{id}',         'TramitesController@edit')->name('tramites.edit');
    Route::put('/{id}',         'TramitesController@update')->name('tramites.update');
    Route::delete('/{id}',      'TramitesController@destroy')->name('tramites.destroy');
});

Route::group(['prefix' => 'sepomex'], function () {
    Route::post('/get-states',                      'SepomexController@get_states')->name('sepomex.getStates');
    Route::post('/get-location-by-state',           'SepomexController@get_location_by_state')->name('sepomex.getLocationByState');
    Route::post('/get-colonies-by-location-state',  'SepomexController@get_colonies_by_location_state')->name('sepomex.getColoniesByLocationState');
    Route::post('/get-zip-code',                    'SepomexController@get_zip_code')->name('sepomex.getZipCode');
    Route::post('/get-search-zip-code',             'SepomexController@get_search_zip_code')->name('sepomex.getSearchZipCode');
});
