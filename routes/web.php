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


Route::get('/home', 'HomeController@index');
Route::get('/contrato', 'ContratosController@index')->name('contrato.index');
Route::get('/contrato/create', 'ContratosController@create')->name('contrato.create');
Route::post('/contrato', 'ContratosController@store')->name('contrato.store');
Route::get('/contrato/{contrato}', 'ContratosController@show')->name('contrato.show');

Route::get('/pasajero', 'PagosController@index');
Route::get('/getpasajeros/{id}', 'ContratosController@getpasajeros');
Route::post('/pasajerocon', 'ContratosController@storePas')->name('contrato.store.pas');

Route::get('/addpago/{id}', 'PagosController@AddPago');
Route::post('/pagostore', 'PagosController@PagoStore')->name('pago.store');

Auth::routes();
