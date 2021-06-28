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

// Route::group(['prefix' => 'adultomayor'], function() {
//     Route::get('/', 'AdultoMayorController@index')->name('adultomayor.index');
// });

//  tipo vivienda
// Route::group(['prefix' => 'vivienda'], function() {

//     Route::get('/', 'TipoViviendaController@index')->name('tipovivienda.index');
// });

//  nacionalidad
// Route::group(['prefix' => 'nacionalidad'], function() {

//     Route::get('/', 'NacionalidadController@index')->name('nacionalidad.index');
// });

//  Adulto Mayor
Route::group(['prefix' => 'adultomayor'], function() {

    Route::get('/', 'AdultoMayorController@index')->name('adultosmayores.index');
    Route::get('/listar', 'AdultoMayorController@listar')->name('adultosmayores.listar');
    Route::get('/show/{id}', 'AdultoMayorController@show')->name('adultosmayores.show');
    Route::get('/create', 'AdultoMayorController@create')->name('adultosmayores.create');
    Route::post('/store', 'AdultoMayorController@store')->name('adultosmayores.store');
    Route::put('/{id}/update', 'AdultoMayorController@update')->name('adultosmayores.update');
    Route::get('/{id}/edit', 'AdultoMayorController@edit')->name('adultosmayores.edit');
    Route::delete('/{id}/destroy', 'AdultoMayorController@destroy')->name('adultosmayores.destroy');

});

Route::group(['prefix' => 'reportes'], function() {

    // Route::get('/', 'PDFAdultoMayorController@PDF')->name('reportes.index');
    Route::get('/show/{id}', 'PDFAdultoMayorController@PDFAM')->name('reportes.show');
});


//  Autonomia Adulto Mayor
Route::group(['prefix' => 'autonomia'], function() {

    Route::get('/', 'AutonomiaController@index')->name('autonomia.index');
    Route::get('/create/{id}', 'AutonomiaController@create')->name('autonomia.create');
    Route::post('/store', 'AutonomiaController@store')->name('autonomia.store');
    Route::put('/{id}/update', 'AutonomiaController@update')->name('autonomia.update');
    Route::get('/edit/{id}', 'AutonomiaController@edit')->name('autonomia.edit');
    Route::delete('/{id}/destroy', 'AutonomiaController@destroy')->name('autonomia.destroy');
});

//  Autonomia Adulto Mayor
Route::group(['prefix' => 'salud'], function() {

    Route::get('/', 'SaludController@index')->name('salud.index');
    Route::get('/create/{id}', 'SaludController@create')->name('salud.create');
    Route::post('/store', 'SaludController@store')->name('salud.store');
    Route::put('/{id}/update', 'SaludController@update')->name('salud.update');
    Route::get('/edit/{id}', 'SaludController@edit')->name('salud.edit');
    Route::delete('/{id}/destroy', 'SaludController@destroy')->name('salud.destroy');
});

//  Vivienda Adulto Mayor
Route::group(['prefix' => 'vivienda'], function() {

    Route::get('/', 'ViviendaAmController@index')->name('vivienda.index');
    Route::get('/create/{id}', 'ViviendaAmController@create')->name('vivienda.create');
    Route::post('/store', 'ViviendaAmController@store')->name('vivienda.store');
    Route::put('/{id}/update', 'ViviendaAmController@update')->name('vivienda.update');
    Route::get('/edit/{id}', 'ViviendaAmController@edit')->name('vivienda.edit');
    Route::delete('/{id}/destroy', 'ViviendaAmController@destroy')->name('vivienda.destroy');
});

//  Habitabilidad Vivienda Adulto Mayor
Route::group(['prefix' => 'habitabilidad'], function() {

    Route::get('/', 'HabitabilidadViviendaController@index')->name('habitabilidad.index');
    Route::get('/create/{id}', 'HabitabilidadViviendaController@create')->name('habitabilidad.create');
    Route::post('/store', 'HabitabilidadViviendaController@store')->name('habitabilidad.store');
    Route::put('/{id}/update', 'HabitabilidadViviendaController@update')->name('habitabilidad.update');
    Route::get('/edit/{id}', 'HabitabilidadViviendaController@edit')->name('habitabilidad.edit');
    Route::delete('/{id}/destroy', 'HabitabilidadViviendaController@destroy')->name('habitabilidad.destroy');
});


//  Acompañante Adulto Mayor
Route::group(['prefix' => 'acompanante'], function() {

    Route::get('/', 'AcompananteController@index')->name('acompanante.index');
    Route::get('/create/{id}', 'AcompananteController@create')->name('acompanante.create');
    Route::post('/store', 'AcompananteController@store')->name('acompanante.store');
    Route::put('/{id}/update', 'AcompananteController@update')->name('acompanante.update');
    Route::get('/edit/{id}', 'AcompananteController@edit')->name('acompanante.edit');
    Route::delete('/{id}/destroy', 'AcompananteController@destroy')->name('acompanante.destroy');
});

//  identificacion Adulto Mayor
Route::group(['prefix' => 'identificacion'], function() {

    Route::get('/', 'IdentificacionController@index')->name('identificacion.index');
    Route::get('/show/{id}', 'IdentificacionController@show')->name('identificacion.show');
    Route::get('/add/{id}', 'IdentificacionController@add')->name('identificacion.add');
    Route::get('/create/{id}', 'IdentificacionController@create')->name('identificacion.create');
    Route::post('/store', 'IdentificacionController@store')->name('identificacion.store');
    Route::post('/agregaretnia', 'IdentificacionController@agregarEtnia')->name('identificacion.agregaretnia');
    Route::put('/{id}/update', 'IdentificacionController@update')->name('identificacion.update');
    Route::get('/{id}/edit', 'IdentificacionController@edit')->name('identificacion.edit');
    Route::delete('/{id}/destroy', 'IdentificacionController@destroy')->name('identificacion.destroy');
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

Route::group(['prefix' => 'patologias'], function() {
    Route::get('/', 'PatologiaController@index')->name('patologias.index');
    Route::get('/create', 'PatologiaController@create')->name('patologias.create');
    Route::post('/store', 'PatologiaController@store')->name('patologias.store');
    Route::put('/{id}/update', 'PatologiaController@update')->name('patologias.update');
    Route::get('/{id}/edit', 'PatologiaController@edit')->name('patologias.edit');
    ROute::delete('/{id}/destroy', 'PatologiaController@destroy')->name('patologias.destroy');
});

Route::group(['prefix' => 'patologias'], function() {
    Route::get('/', 'PatologiaController@index')->name('patologias.index');
    Route::get('/create', 'PatologiaController@create')->name('patologias.create');
    Route::post('/store', 'PatologiaController@store')->name('patologias.store');
    Route::put('/{id}/update', 'PatologiaController@update')->name('patologias.update');
    Route::get('/{id}/edit', 'PatologiaController@edit')->name('patologias.edit');
    ROute::delete('/{id}/destroy', 'PatologiaController@destroy')->name('patologias.destroy');
});

Route::group(['prefix' => 'institucionsalud'], function() {
    Route::get('/', 'InstitucionSaludController@index')->name('institucionsalud.index');
    Route::get('/create', 'InstitucionSaludController@create')->name('institucionsalud.create');
    Route::post('/store', 'InstitucionSaludController@store')->name('institucionsalud.store');
    Route::put('/{id}/update', 'InstitucionSaludController@update')->name('institucionsalud.update');
    Route::get('/{id}/edit', 'InstitucionSaludController@edit')->name('institucionsalud.edit');
    ROute::delete('/{id}/destroy', 'InstitucionSaludController@destroy')->name('institucionsalud.destroy');
});

Route::group(['prefix' => 'tipodiscapacidades'], function() {
    Route::get('/', 'TipoDiscapacidadController@index')->name('tipodiscapacidades.index');
    Route::get('/create', 'TipoDiscapacidadController@create')->name('tipodiscapacidades.create');
    Route::post('/store', 'TipoDiscapacidadController@store')->name('tipodiscapacidades.store');
    Route::put('/{id}/update', 'TipoDiscapacidadController@update')->name('tipodiscapacidades.update');
    Route::get('/{id}/edit', 'TipoDiscapacidadController@edit')->name('tipodiscapacidades.edit');
    ROute::delete('/{id}/destroy', 'TipoDiscapacidadController@destroy')->name('tipodiscapacidades.destroy');
});

Route::group(['prefix' => 'discapacidades'], function() {
    Route::get('/', 'DiscapacidadAmController@index')->name('discapacidades.index');
    Route::get('/show/{id}', 'DiscapacidadAmController@show')->name('discapacidades.show');
    Route::get('/create/{id}', 'DiscapacidadAmController@create')->name('discapacidades.create');
    Route::post('/store', 'DiscapacidadAmController@store')->name('discapacidades.store');
    Route::put('/{id}/update', 'DiscapacidadAmController@update')->name('discapacidades.update');
    Route::get('/{id}/edit', 'DiscapacidadAmController@edit')->name('discapacidades.edit');
    ROute::delete('/{id}/destroy', 'DiscapacidadAmController@destroy')->name('discapacidades.destroy');
});

Route::group(['prefix' => 'actividades'], function() {
    Route::get('/', 'ActividadController@index')->name('actividades.index');
    Route::get('/create', 'ActividadController@create')->name('actividades.create');
    Route::post('/store', 'ActividadController@store')->name('actividades.store');
    Route::put('/{id}/update', 'ActividadController@update')->name('actividades.update');
    Route::get('/{id}/edit', 'ActividadController@edit')->name('actividades.edit');
    ROute::delete('/{id}/destroy', 'ActividadController@destroy')->name('actividades.destroy');
});

Route::group(['prefix' => 'ayudastecnicas'], function() {
    Route::get('/', 'AyudaTecnicaController@index')->name('ayudastecnicas.index');
    Route::get('/create', 'AyudaTecnicaController@create')->name('ayudastecnicas.create');
    Route::post('/store', 'AyudaTecnicaController@store')->name('ayudastecnicas.store');
    Route::put('/{id}/update', 'AyudaTecnicaController@update')->name('ayudastecnicas.update');
    Route::get('/{id}/edit', 'AyudaTecnicaController@edit')->name('ayudastecnicas.edit');
    ROute::delete('/{id}/destroy', 'AyudaTecnicaController@destroy')->name('ayudastecnicas.destroy');
});

Route::group(['prefix' => 'atenciones'], function() {
    Route::get('/', 'AtencionController@index')->name('atenciones.index');
    Route::get('/create', 'AtencionController@create')->name('atenciones.create');
    Route::post('/store', 'AtencionController@store')->name('atenciones.store');
    Route::put('/{id}/update', 'AtencionController@update')->name('atenciones.update');
    Route::get('/{id}/edit', 'AtencionController@edit')->name('atenciones.edit');
    ROute::delete('/{id}/destroy', 'AtencionController@destroy')->name('atenciones.destroy');
});

Route::group(['prefix' => 'serviciosbasicos'], function() {
    Route::get('/', 'ServicioBasicoController@index')->name('serviciosbasicos.index');
    Route::get('/create', 'ServicioBasicoController@create')->name('serviciosbasicos.create');
    Route::post('/store', 'ServicioBasicoController@store')->name('serviciosbasicos.store');
    Route::put('/{id}/update', 'ServicioBasicoController@update')->name('serviciosbasicos.update');
    Route::get('/{id}/edit', 'ServicioBasicoController@edit')->name('serviciosbasicos.edit');
    ROute::delete('/{id}/destroy', 'ServicioBasicoController@destroy')->name('serviciosbasicos.destroy');
});

Route::group(['prefix' => 'trabajosbano'], function() {
    Route::get('/', 'TrabajoBanoController@index')->name('trabajosbano.index');
    Route::get('/create', 'TrabajoBanoController@create')->name('trabajosbano.create');
    Route::post('/store', 'TrabajoBanoController@store')->name('trabajosbano.store');
    Route::put('/{id}/update', 'TrabajoBanoController@update')->name('trabajosbano.update');
    Route::get('/{id}/edit', 'TrabajoBanoController@edit')->name('trabajosbano.edit');
    ROute::delete('/{id}/destroy', 'TrabajoBanoController@destroy')->name('trabajosbano.destroy');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
