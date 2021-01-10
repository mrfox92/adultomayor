<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');
//  adulto mayor

Route::group(['prefix' => 'adultomayor'], function() {
    Route::get('/', 'AdultoMayorController@index')->name('adultomayor.index');
});

//  tipo vivienda
Route::group(['prefix' => 'vivienda'], function() {

    Route::get('/', 'TipoViviendaController@index')->name('tipovivienda.index');
});

//  nacionalidad
Route::group(['prefix' => 'nacionalidad'], function() {

    Route::get('/', 'NacionalidadController@index')->name('nacionalidad.index');
});

//  alfabetizacion
Route::group(['prefix' => 'alfabetizacion'], function() {

    Route::get('/', 'AlfabetizacionController@index')->name('alfabetizacion.index');
    Route::get('/create', 'AlfabetizacionController@create')->name('alfabetizacion.create');
    Route::post('/store', 'AlfabetizacionController@store')->name('alfabetizacion.store');
    Route::put('/{id}/update', 'AlfabetizacionController@update')->name('alfabetizacion.update');
    Route::get('/{id}/edit', 'AlfabetizacionController@edit')->name('alfabetizacion.edit');
    Route::delete('/{id}/destroy', 'AlfabetizacionController@destroy')->name('alfabetizacion.destroy');

});


Route::group(['prefix' => 'nacionalidad'], function() {
    Route::get('/', 'NacionalidadController@index')->name('nacionalidad.index');
    Route::get('/create', 'NacionalidadController@create')->name('nacionalidad.create');
    Route::post('/store', 'NacionalidadController@store')->name('nacionalidad.store');
    Route::put('/{id}/update', 'NacionalidadController@update')->name('nacionalidad.update');
    Route::get('/{id}/edit', 'NacionalidadController@edit')->name('nacionalidad.edit');
    ROute::delete('/{id}/destroy', 'NacionalidadController@destroy')->name('nacionalidad.destroy');
});

Route::group(['prefix' => 'etnia'], function() {
    Route::get('/', 'EtniaController@index')->name('etnia.index');
    Route::get('/create', 'EtniaController@create')->name('etnia.create');
    Route::post('/store', 'EtniaController@store')->name('etnia.store');
    Route::put('/{id}/update', 'EtniaController@update')->name('etnia.update');
    Route::get('/{id}/edit', 'EtniaController@edit')->name('etnia.edit');
    ROute::delete('/{id}/destroy', 'EtniaController@destroy')->name('etnia.destroy');
});

Route::group(['prefix' => 'nucleofamiliar'], function() {
    Route::get('/', 'NucleoFamiliarController@index')->name('nucleofamiliar.index');
    Route::get('/create', 'NucleoFamiliarController@create')->name('nucleofamiliar.create');
    Route::post('/store', 'NucleoFamiliarController@store')->name('nucleofamiliar.store');
    Route::put('/{id}/update', 'NucleoFamiliarController@update')->name('nucleofamiliar.update');
    Route::get('/{id}/edit', 'NucleoFamiliarController@edit')->name('nucleofamiliar.edit');
    ROute::delete('/{id}/destroy', 'NucleoFamiliarController@destroy')->name('nucleofamiliar.destroy');
});

Route::group(['prefix' => 'redes'], function() {
    Route::get('/', 'RedController@index')->name('redes.index');
    Route::get('/create', 'RedController@create')->name('redes.create');
    Route::post('/store', 'RedController@store')->name('redes.store');
    Route::put('/{id}/update', 'RedController@update')->name('redes.update');
    Route::get('/{id}/edit', 'RedController@edit')->name('redes.edit');
    ROute::delete('/{id}/destroy', 'RedController@destroy')->name('redes.destroy');
});

Route::group(['prefix' => 'tipoviviendas'], function() {
    Route::get('/', 'TipoViviendaController@index')->name('tipoviviendas.index');
    Route::get('/create', 'TipoViviendaController@create')->name('tipoviviendas.create');
    Route::post('/store', 'TipoViviendaController@store')->name('tipoviviendas.store');
    Route::put('/{id}/update', 'TipoViviendaController@update')->name('tipoviviendas.update');
    Route::get('/{id}/edit', 'TipoViviendaController@edit')->name('tipoviviendas.edit');
    ROute::delete('/{id}/destroy', 'TipoViviendaController@destroy')->name('tipoviviendas.destroy');
});

Route::group(['prefix' => 'ingresos'], function() {
    Route::get('/', 'TipoIngresoController@index')->name('ingresos.index');
    Route::get('/create', 'TipoIngresoController@create')->name('ingresos.create');
    Route::post('/store', 'TipoIngresoController@store')->name('ingresos.store');
    Route::put('/{id}/update', 'TipoIngresoController@update')->name('ingresos.update');
    Route::get('/{id}/edit', 'TipoIngresoController@edit')->name('ingresos.edit');
    ROute::delete('/{id}/destroy', 'TipoIngresoController@destroy')->name('ingresos.destroy');
});

Route::group(['prefix' => 'tipotalleres'], function() {
    Route::get('/', 'TipoTallerController@index')->name('tipotalleres.index');
    Route::get('/create', 'TipoTallerController@create')->name('tipotalleres.create');
    Route::post('/store', 'TipoTallerController@store')->name('tipotalleres.store');
    Route::put('/{id}/update', 'TipoTallerController@update')->name('tipotalleres.update');
    Route::get('/{id}/edit', 'TipoTallerController@edit')->name('tipotalleres.edit');
    ROute::delete('/{id}/destroy', 'TipoTallerController@destroy')->name('tipotalleres.destroy');
});

Route::group(['prefix' => 'talleres'], function() {
    Route::get('/', 'TallerController@index')->name('talleres.index');
    Route::get('/create', 'TallerController@create')->name('talleres.create');
    Route::post('/store', 'TallerController@store')->name('talleres.store');
    Route::put('/{id}/update', 'TallerController@update')->name('talleres.update');
    Route::get('/{id}/edit', 'TallerController@edit')->name('talleres.edit');
    ROute::delete('/{id}/destroy', 'TallerController@destroy')->name('talleres.destroy');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
