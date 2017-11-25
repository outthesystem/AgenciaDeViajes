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


Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::get('/contrato', 'ContratosController@index')->name('contrato.index');
Route::get('/contrato/create', 'ContratosController@create')->name('contrato.create');
Route::post('/contrato', 'ContratosController@store')->name('contrato.store');
Route::get('/contrato/{contrato}', 'ContratosController@show')->name('contrato.show');

Route::get('/pasajero', 'PagosController@index')->name('pasajero.index');
Route::get('/getpasajeros/{id}', 'ContratosController@getpasajeros');
Route::get('/getcontratos', 'ContratosController@SearchData');
Route::get('/getpasajeros', 'PasajerosController@SearchData');
Route::post('/pasajerocon', 'ContratosController@storePas')->name('contrato.store.pas');
Route::get('/getrecibos/{id}', 'PagosController@SearchData');

Route::get('/export-contrato-colegios', 'DashboardController@exportColegios')->name('export.contratos');

Route::get('/addpago/{id}', 'PagosController@AddPago');
Route::get('/addpago/imprimir/{id}', 'PagosController@ImprimirPago');
Route::post('/pagostore', 'PagosController@PagoStore')->name('pago.store');

Auth::routes();
