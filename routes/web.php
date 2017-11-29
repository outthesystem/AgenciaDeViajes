<?php

//dashboard routes

Route::group(['middleware' => ['permission:ver_dashboard']], function () {
  Route::get('/', 'DashboardController@index')->name('dashboard.index');
});

//contrato routes

Route::group(['middleware' => ['permission:ver_contratos']], function () {
  Route::get('/contrato', 'ContratosController@index')->name('contrato.index');
  Route::get('/getcontratos', 'ContratosController@SearchData');
});

Route::group(['middleware' => ['permission:crear_contratos']], function () {
  Route::get('/contrato/create', 'ContratosController@create')->name('contrato.create');
  Route::post('/contrato', 'ContratosController@store')->name('contrato.store');
});

Route::group(['middleware' => ['permission:editar_contratos']], function () {
  Route::get('/contrato/{contrato}', 'ContratosController@show')->name('contrato.show');
});

// pasajeros routes

Route::group(['middleware' => ['permission:crear_pasajeros']], function () {
  Route::post('/pasajerocon', 'ContratosController@storePas')->name('contrato.store.pas');
});

Route::group(['middleware' => ['permission:ver_pasajeros']], function () {
  Route::get('/pasajero', 'PagosController@index')->name('pasajero.index');
  Route::get('/getpasajeros/{id}', 'ContratosController@getpasajeros');
  Route::get('/getpasajeros', 'PasajerosController@SearchData');
});

Route::get('/getrecibos/{id}', 'PagosController@SearchData');

Route::group(['middleware' => ['permission:ver_recibos']], function () {
    Route::get('/recibo', 'PagosController@indexRecibo')->name('recibos.index');
});

Route::group(['middleware' => ['permission:crear_recibos']], function () {
  Route::get('/addpago/{id}', 'PagosController@AddPago');
  Route::get('/addpago/imprimir/{id}', 'PagosController@ImprimirPago');
  Route::post('/pagostore', 'PagosController@PagoStore')->name('pago.store');
});

Route::get('/export-contrato-colegios', 'DashboardController@exportColegios')->name('export.contratos');

Auth::routes();

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
	Route::resource('permissions','PermissionController');
});
