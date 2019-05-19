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
Route::get('/tablaPropuestas', 'propuestasController@index')->name('tablaPropuestas');

Route::post("storeTest","test@store");
Route::post("storePropuestas","propuestasController@store");
Route::post("storePrestamos","prestamosController@store");
Route::resource('propuestas','propuestasController');
Route::resource('transacciones','test');
Route::resource('prestamos','prestamosController');
Route::get('/crearPropuesta','propuestasController@crearPropuesta')->name('crearPropuesta');
Route::get('/tablaPropuestas2','propuestasController@index2')->name('tablaPropuestas2');
Route::get('/tablasPropuestas3','propuestasController@index3')->name('tablaPropuestas3');