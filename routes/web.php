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


//  Datos agrupados - AM
Route::group(['prefix' => 'informacionam', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN)]], function() {

    Route::get('/', 'InfoAMController@index')->name('informacionam.index');
    Route::get('/etnias', 'InfoAMController@etnias')->name('informacionam.etnias');
    Route::get('/nacionalidades', 'InfoAMController@export')->name('informacionam.export');
    Route::get('/instituciones', 'InfoAMController@instituciones')->name('informacionam.instituciones');
    Route::get('/talleres', 'InfoAMController@talleres')->name('informacionam.talleres');
    Route::get('/nucleosfamiliares', 'InfoAMController@nucleosfamiliares')->name('informacionam.nucleosfamiliares');
    Route::get('/previsiones', 'InfoAMController@previsiones')->name('informacionam.previsiones');
    Route::get('/tipoviviendas', 'InfoAMController@tipoviviendas')->name('informacionam.tipoviviendas');
    Route::get('/alfabetizacion', 'InfoAMController@alfabetizacion')->name('informacionam.alfabetizacion');
    Route::get('/actividades', 'InfoAMController@actividades')->name('informacionam.actividades');
    Route::get('/programas', 'InfoAMController@programas')->name('informacionam.programas');
    Route::get('/ayudastecnicas', 'InfoAMController@ayudastecnicas')->name('informacionam.ayudastecnicas');
    Route::get('/atenciones', 'InfoAMController@atenciones')->name('informacionam.atenciones');
    Route::get('/sexos', 'InfoAMController@sexos')->name('informacionam.sexos');
    Route::get('/vacunados', 'InfoAMController@vacunados')->name('informacionam.vacunados');
    Route::get('/discapacidades', 'InfoAMController@discapacidades')->name('informacionam.discapacidades');
});

//  Datos agrupados - AM
Route::group(['prefix' => 'informacionpsd', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN)]], function() {

    Route::get('/', 'InformacionPSDController@index')->name('informacionpsd.index');
    Route::get('/nacionalidades', 'InformacionPSDController@nacionalidades')->name('informacionpsd.nacionalidades');
    Route::get('/pensiones', 'InformacionPSDController@pensiones')->name('informacionpsd.pensiones');
    Route::get('/establecimientos', 'InformacionPSDController@establecimientos')->name('informacionpsd.establecimientos');
    Route::get('/dependientes', 'InformacionPSDController@dependientes')->name('informacionpsd.dependientes');
    Route::get('/independientes', 'InformacionPSDController@independientes')->name('informacionpsd.independientes');
    Route::get('/otras', 'InformacionPSDController@otras')->name('informacionpsd.otras');
    Route::get('/beneficios', 'InformacionPSDController@beneficios')->name('informacionpsd.beneficios');
    Route::get('/discapacidades', 'InformacionPSDController@discapacidades')->name('informacionpsd.discapacidades');
    Route::get('/sexos', 'InformacionPSDController@sexos')->name('informacionpsd.sexos');
});



//  Usuarios
Route::group(['prefix' => 'usuarios', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN)]], function() {

    Route::get('/', 'UserController@index')->name('usuarios.index');
    Route::get('/listar', 'UserController@listar')->name('usuarios.listar');
    Route::post('/restaurar', 'UserController@restaurar')->name('usuarios.restaurar');
    Route::get('/create', 'UserController@create')->name('usuarios.create');
    Route::post('/store', 'UserController@store')->name('usuarios.store');
    Route::put('/{id}/update', 'UserController@update')->name('usuarios.update');
    Route::get('/{id}/edit', 'UserController@edit')->name('usuarios.edit');
    Route::delete('/{id}/destroy', 'UserController@destroy')->name('usuarios.destroy');

});

//  Perfil
Route::group(['prefix' => 'perfil', 'middleware' => ['auth']], function() {

    Route::get('/', 'PerfilController@index')->name('perfil.index');
    Route::put('/{id}/update', 'PerfilController@update')->name('perfil.update');
    Route::get('/{id}/edit', 'PerfilController@edit')->name('perfil.edit');
});

//  Adulto Mayor
Route::group(['prefix' => 'adultomayor'], function() {


    Route::group(['middleware' => [ 'auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR) ]], function() {
        
        
        Route::get('/', 'AdultoMayorController@index')->name('adultosmayores.index');
        Route::get('/show/{id}', 'AdultoMayorController@show')->name('adultosmayores.show');
        Route::get('/create', 'AdultoMayorController@create')->name('adultosmayores.create');
        Route::post('/store', 'AdultoMayorController@store')->name('adultosmayores.store');
        Route::put('/{id}/update', 'AdultoMayorController@update')->name('adultosmayores.update');
        Route::get('/{id}/edit', 'AdultoMayorController@edit')->name('adultosmayores.edit');
        Route::delete('/{id}/destroy', 'AdultoMayorController@destroy')->name('adultosmayores.destroy');
        
    });
    
    Route::get('/listar', 'AdultoMayorController@listar')->name('adultosmayores.listar');


});

//  PSD

Route::group(['prefix' => 'psd'], function() {
    
    
    Route::group(['middleware' => [ 'auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR) ]], function() {
        
        Route::get('/', 'PSDController@index')->name('psd.index');
        Route::get('/listar', 'PSDController@listar')->name('psd.listar');
        Route::get('/create', 'PSDController@create')->name('psd.create');
        Route::get('/show/{id}', 'PSDController@show')->name('psd.show');
        Route::post('/store', 'PSDController@store')->name('psd.store');
        Route::put('/{id}/update', 'PSDController@update')->name('psd.update');
        Route::get('/{id}/edit', 'PSDController@edit')->name('psd.edit');
        Route::delete('/{id}/destroy', 'PSDController@destroy')->name('psd.destroy');
        
    });


});


//  establecimiento educacional PSD
Route::group(['prefix' => 'establecimiento', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'EstablecimientoController@index')->name('establecimiento.index');
    Route::get('/show/{id}', 'EstablecimientoController@show')->name('establecimiento.show');
    Route::get('/create/{id}', 'EstablecimientoController@create')->name('establecimiento.create');
    Route::post('/store', 'EstablecimientoController@store')->name('establecimiento.store');
    Route::put('/{id}/update', 'EstablecimientoController@update')->name('establecimiento.update');
    Route::get('/edit/{id}', 'EstablecimientoController@edit')->name('establecimiento.edit');
    Route::delete('/{id}/destroy', 'EstablecimientoController@destroy')->name('establecimiento.destroy');
});

//  establecimiento educacional PSD
Route::group(['prefix' => 'trabajador', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'TrabajadorPSDController@index')->name('trabajador.index');
    Route::get('/show/{id}', 'TrabajadorPSDController@show')->name('trabajador.show');
    Route::get('/create/{id}', 'TrabajadorPSDController@create')->name('trabajador.create');
    Route::post('/store', 'TrabajadorPSDController@store')->name('trabajador.store');
    Route::put('/{id}/update', 'TrabajadorPSDController@update')->name('trabajador.update');
    Route::get('/edit/{id}', 'TrabajadorPSDController@edit')->name('trabajador.edit');
    Route::delete('/{id}/destroy', 'TrabajadorPSDController@destroy')->name('trabajador.destroy');
});

//  Otras ocupaciones PSD
Route::group(['prefix' => 'otras', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'OtraOcupacionPSDController@index')->name('otras.index');
    Route::get('/show/{id}', 'OtraOcupacionPSDController@show')->name('otras.show');
    Route::get('/create/{id}', 'OtraOcupacionPSDController@create')->name('otras.create');
    Route::post('/store', 'OtraOcupacionPSDController@store')->name('otras.store');
    Route::put('/{id}/update', 'OtraOcupacionPSDController@update')->name('otras.update');
    Route::get('/edit/{id}', 'OtraOcupacionPSDController@edit')->name('otras.edit');
    Route::delete('/{id}/destroy', 'OtraOcupacionPSDController@destroy')->name('otras.destroy');
});


//  Independientes PSD
Route::group(['prefix' => 'independientes', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'IndependientePSDController@index')->name('independientes.index');
    Route::get('/show/{id}', 'IndependientePSDController@show')->name('independientes.show');
    Route::get('/create/{id}', 'IndependientePSDController@create')->name('independientes.create');
    Route::post('/store', 'IndependientePSDController@store')->name('independientes.store');
    Route::put('/{id}/update', 'IndependientePSDController@update')->name('independientes.update');
    Route::get('/edit/{id}', 'IndependientePSDController@edit')->name('independientes.edit');
    Route::delete('/{id}/destroy', 'IndependientePSDController@destroy')->name('independientes.destroy');
});

Route::group(['prefix' => 'reportes', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/show/{id}', 'PDFAdultoMayorController@PDFAM')->name('reportes.show');
});

Route::group(['prefix' => 'pdfpds', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)] ], function() {

    Route::get('/show/{id}', 'PDFPSDController@reporte')->name('psdreporte.show');
});


//  Autonomia Adulto Mayor
Route::group(['prefix' => 'autonomia', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'AutonomiaController@index')->name('autonomia.index');
    Route::get('/show/{id}', 'AutonomiaController@show')->name('autonomia.show');
    Route::get('/create/{id}', 'AutonomiaController@create')->name('autonomia.create');
    Route::post('/store', 'AutonomiaController@store')->name('autonomia.store');
    Route::put('/{id}/update', 'AutonomiaController@update')->name('autonomia.update');
    Route::get('/edit/{id}', 'AutonomiaController@edit')->name('autonomia.edit');
    Route::delete('/{id}/destroy', 'AutonomiaController@destroy')->name('autonomia.destroy');
});

//  Autonomia Adulto Mayor
Route::group(['prefix' => 'salud', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'SaludController@index')->name('salud.index');
    Route::get('/show/{id}', 'SaludController@show')->name('salud.show');
    Route::get('/create/{id}', 'SaludController@create')->name('salud.create');
    Route::post('/store', 'SaludController@store')->name('salud.store');
    Route::put('/{id}/update', 'SaludController@update')->name('salud.update');
    Route::get('/edit/{id}', 'SaludController@edit')->name('salud.edit');
    Route::delete('/{id}/destroy', 'SaludController@destroy')->name('salud.destroy');
});

//  Vivienda Adulto Mayor
Route::group(['prefix' => 'vivienda', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'ViviendaAmController@index')->name('vivienda.index');
    Route::get('/show/{id}', 'ViviendaAmController@show')->name('vivienda.show');
    Route::get('/create/{id}', 'ViviendaAmController@create')->name('vivienda.create');
    Route::post('/store', 'ViviendaAmController@store')->name('vivienda.store');
    Route::put('/{id}/update', 'ViviendaAmController@update')->name('vivienda.update');
    Route::get('/edit/{id}', 'ViviendaAmController@edit')->name('vivienda.edit');
    Route::delete('/{id}/destroy', 'ViviendaAmController@destroy')->name('vivienda.destroy');
});

//  Habitabilidad Vivienda Adulto Mayor
Route::group(['prefix' => 'habitabilidad', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'HabitabilidadViviendaController@index')->name('habitabilidad.index');
    Route::get('/create/{id}', 'HabitabilidadViviendaController@create')->name('habitabilidad.create');
    Route::post('/store', 'HabitabilidadViviendaController@store')->name('habitabilidad.store');
    Route::put('/{id}/update', 'HabitabilidadViviendaController@update')->name('habitabilidad.update');
    Route::get('/edit/{id}', 'HabitabilidadViviendaController@edit')->name('habitabilidad.edit');
    Route::get('/show/{id}', 'HabitabilidadViviendaController@show')->name('habitabilidad.show');
    Route::delete('/{id}/destroy', 'HabitabilidadViviendaController@destroy')->name('habitabilidad.destroy');
});


//  Acompañante Adulto Mayor
Route::group(['prefix' => 'acompanante', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'AcompananteController@index')->name('acompanante.index');
    Route::get('/create/{id}', 'AcompananteController@create')->name('acompanante.create');
    Route::post('/store', 'AcompananteController@store')->name('acompanante.store');
    Route::put('/{id}/update', 'AcompananteController@update')->name('acompanante.update');
    Route::get('/edit/{id}', 'AcompananteController@edit')->name('acompanante.edit');
    Route::delete('/{id}/destroy', 'AcompananteController@destroy')->name('acompanante.destroy');
});

//  identificacion Adulto Mayor
Route::group(['prefix' => 'identificacion', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

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
Route::group(['prefix' => 'alfabetizacion', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {

    Route::get('/', 'AlfabetizacionController@index')->name('alfabetizacion.index');
    Route::get('/listar', 'AlfabetizacionController@listar')->name('alfabetizacion.listar');
    Route::get('/create', 'AlfabetizacionController@create')->name('alfabetizacion.create');
    Route::post('/store', 'AlfabetizacionController@store')->name('alfabetizacion.store');
    Route::put('/{id}/update', 'AlfabetizacionController@update')->name('alfabetizacion.update');
    Route::get('/{id}/edit', 'AlfabetizacionController@edit')->name('alfabetizacion.edit');
    Route::delete('/{id}/destroy', 'AlfabetizacionController@destroy')->name('alfabetizacion.destroy');

});


Route::group(['prefix' => 'nacionalidad', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'NacionalidadController@index')->name('nacionalidad.index');
    Route::get('/create', 'NacionalidadController@create')->name('nacionalidad.create');
    Route::post('/store', 'NacionalidadController@store')->name('nacionalidad.store');
    Route::put('/{id}/update', 'NacionalidadController@update')->name('nacionalidad.update');
    Route::get('/{id}/edit', 'NacionalidadController@edit')->name('nacionalidad.edit');
    ROute::delete('/{id}/destroy', 'NacionalidadController@destroy')->name('nacionalidad.destroy');
});

Route::group(['prefix' => 'etnia', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'EtniaController@index')->name('etnia.index');
    Route::get('/create', 'EtniaController@create')->name('etnia.create');
    Route::post('/store', 'EtniaController@store')->name('etnia.store');
    Route::put('/{id}/update', 'EtniaController@update')->name('etnia.update');
    Route::get('/{id}/edit', 'EtniaController@edit')->name('etnia.edit');
    ROute::delete('/{id}/destroy', 'EtniaController@destroy')->name('etnia.destroy');
});

Route::group(['prefix' => 'nucleofamiliar', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'NucleoFamiliarController@index')->name('nucleofamiliar.index');
    Route::get('/create', 'NucleoFamiliarController@create')->name('nucleofamiliar.create');
    Route::post('/store', 'NucleoFamiliarController@store')->name('nucleofamiliar.store');
    Route::put('/{id}/update', 'NucleoFamiliarController@update')->name('nucleofamiliar.update');
    Route::get('/{id}/edit', 'NucleoFamiliarController@edit')->name('nucleofamiliar.edit');
    ROute::delete('/{id}/destroy', 'NucleoFamiliarController@destroy')->name('nucleofamiliar.destroy');
});

Route::group(['prefix' => 'redes', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'RedController@index')->name('redes.index');
    Route::get('/create', 'RedController@create')->name('redes.create');
    Route::post('/store', 'RedController@store')->name('redes.store');
    Route::put('/{id}/update', 'RedController@update')->name('redes.update');
    Route::get('/{id}/edit', 'RedController@edit')->name('redes.edit');
    ROute::delete('/{id}/destroy', 'RedController@destroy')->name('redes.destroy');
});

Route::group(['prefix' => 'amred', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmRedController@index')->name('amred.index');
    Route::get('/show/{id}', 'AmRedController@show')->name('amred.show');
    Route::get('/create/{id}', 'AmRedController@create')->name('amred.create');
    Route::post('/store', 'AmRedController@store')->name('amred.store');
    Route::put('/{id}/update', 'AmRedController@update')->name('amred.update');
    Route::get('/{id}/edit', 'AmRedController@edit')->name('amred.edit');
    ROute::delete('/{id}/destroy', 'AmRedController@destroy')->name('amred.destroy');
});

Route::group(['prefix' => 'tipoviviendas', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TipoViviendaController@index')->name('tipoviviendas.index');
    Route::get('/listar', 'TipoViviendaController@listar')->name('tipoviviendas.listar');
    Route::get('/create', 'TipoViviendaController@create')->name('tipoviviendas.create');
    Route::post('/store', 'TipoViviendaController@store')->name('tipoviviendas.store');
    Route::put('/{id}/update', 'TipoViviendaController@update')->name('tipoviviendas.update');
    Route::get('/{id}/edit', 'TipoViviendaController@edit')->name('tipoviviendas.edit');
    ROute::delete('/{id}/destroy', 'TipoViviendaController@destroy')->name('tipoviviendas.destroy');
});

Route::group(['prefix' => 'ingresos', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TipoIngresoController@index')->name('ingresos.index');
    Route::get('/create', 'TipoIngresoController@create')->name('ingresos.create');
    Route::post('/store', 'TipoIngresoController@store')->name('ingresos.store');
    Route::put('/{id}/update', 'TipoIngresoController@update')->name('ingresos.update');
    Route::get('/{id}/edit', 'TipoIngresoController@edit')->name('ingresos.edit');
    ROute::delete('/{id}/destroy', 'TipoIngresoController@destroy')->name('ingresos.destroy');
});

//  ingresos adulto mayor

Route::group(['prefix' => 'amingresos', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmIngresosController@index')->name('amingresos.index');
    Route::get('/show/{id}', 'AmIngresosController@show')->name('amingresos.show');
    Route::get('/create/{id}', 'AmIngresosController@create')->name('amingresos.create');
    Route::post('/store', 'AmIngresosController@store')->name('amingresos.store');
    Route::put('/{id}/update', 'AmIngresosController@update')->name('amingresos.update');
    Route::get('/{id}/edit', 'AmIngresosController@edit')->name('amingresos.edit');
    Route::delete('/{id}/destroy', 'AmIngresosController@destroy')->name('amingresos.destroy');
});

Route::group(['prefix' => 'tipotalleres', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TipoTallerController@index')->name('tipotalleres.index');
    Route::get('/create', 'TipoTallerController@create')->name('tipotalleres.create');
    Route::post('/store', 'TipoTallerController@store')->name('tipotalleres.store');
    Route::put('/{id}/update', 'TipoTallerController@update')->name('tipotalleres.update');
    Route::get('/{id}/edit', 'TipoTallerController@edit')->name('tipotalleres.edit');
    Route::delete('/{id}/destroy', 'TipoTallerController@destroy')->name('tipotalleres.destroy');
});

Route::group(['prefix' => 'talleres', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TallerController@index')->name('talleres.index');
    Route::get('/listar', 'TallerController@listar')->name('talleres.listar');
    Route::get('/create', 'TallerController@create')->name('talleres.create');
    Route::post('/store', 'TallerController@store')->name('talleres.store');
    Route::put('/{id}/update', 'TallerController@update')->name('talleres.update');
    Route::get('/{id}/edit', 'TallerController@edit')->name('talleres.edit');
    Route::delete('/{id}/destroy', 'TallerController@destroy')->name('talleres.destroy');
});

Route::group(['prefix' => 'talleram', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TallerAmController@index')->name('talleram.index');
    Route::get('/show/{id}', 'TallerAmController@show')->name('talleram.show');
    Route::get('/create/{id}', 'TallerAmController@create')->name('talleram.create');
    Route::post('/store', 'TallerAmController@store')->name('talleram.store');
    Route::put('/{id}/update', 'TallerAmController@update')->name('talleram.update');
    Route::get('/{id}/edit', 'TallerAmController@edit')->name('talleram.edit');
    Route::delete('/{id}/destroy', 'TallerAmController@destroy')->name('talleram.destroy');
});

Route::group(['prefix' => 'patologias', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'PatologiaController@index')->name('patologias.index');
    Route::get('/create', 'PatologiaController@create')->name('patologias.create');
    Route::post('/store', 'PatologiaController@store')->name('patologias.store');
    Route::put('/{id}/update', 'PatologiaController@update')->name('patologias.update');
    Route::get('/{id}/edit', 'PatologiaController@edit')->name('patologias.edit');
    Route::delete('/{id}/destroy', 'PatologiaController@destroy')->name('patologias.destroy');
});

Route::group(['prefix' => 'patologias', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'PatologiaController@index')->name('patologias.index');
    Route::get('/create', 'PatologiaController@create')->name('patologias.create');
    Route::post('/store', 'PatologiaController@store')->name('patologias.store');
    Route::put('/{id}/update', 'PatologiaController@update')->name('patologias.update');
    Route::get('/{id}/edit', 'PatologiaController@edit')->name('patologias.edit');
    Route::delete('/{id}/destroy', 'PatologiaController@destroy')->name('patologias.destroy');
});

Route::group(['prefix' => 'institucionsalud', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'InstitucionSaludController@index')->name('institucionsalud.index');
    Route::get('/create', 'InstitucionSaludController@create')->name('institucionsalud.create');
    Route::post('/store', 'InstitucionSaludController@store')->name('institucionsalud.store');
    Route::put('/{id}/update', 'InstitucionSaludController@update')->name('institucionsalud.update');
    Route::get('/{id}/edit', 'InstitucionSaludController@edit')->name('institucionsalud.edit');
    Route::delete('/{id}/destroy', 'InstitucionSaludController@destroy')->name('institucionsalud.destroy');
});

Route::group(['prefix' => 'tipodiscapacidades', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TipoDiscapacidadController@index')->name('tipodiscapacidades.index');
    Route::get('/create', 'TipoDiscapacidadController@create')->name('tipodiscapacidades.create');
    Route::post('/store', 'TipoDiscapacidadController@store')->name('tipodiscapacidades.store');
    Route::put('/{id}/update', 'TipoDiscapacidadController@update')->name('tipodiscapacidades.update');
    Route::get('/{id}/edit', 'TipoDiscapacidadController@edit')->name('tipodiscapacidades.edit');
    Route::delete('/{id}/destroy', 'TipoDiscapacidadController@destroy')->name('tipodiscapacidades.destroy');
});

Route::group(['prefix' => 'discapacidades', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'DiscapacidadAmController@index')->name('discapacidades.index');
    Route::get('/show/{id}', 'DiscapacidadAmController@show')->name('discapacidades.show');
    Route::get('/create/{id}', 'DiscapacidadAmController@create')->name('discapacidades.create');
    Route::post('/store', 'DiscapacidadAmController@store')->name('discapacidades.store');
    Route::put('/{id}/update', 'DiscapacidadAmController@update')->name('discapacidades.update');
    Route::get('/{id}/edit', 'DiscapacidadAmController@edit')->name('discapacidades.edit');
    Route::delete('/{id}/destroy', 'DiscapacidadAmController@destroy')->name('discapacidades.destroy');
});

Route::group(['prefix' => 'actividades', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'ActividadController@index')->name('actividades.index');
    Route::get('/create', 'ActividadController@create')->name('actividades.create');
    Route::post('/store', 'ActividadController@store')->name('actividades.store');
    Route::put('/{id}/update', 'ActividadController@update')->name('actividades.update');
    Route::get('/{id}/edit', 'ActividadController@edit')->name('actividades.edit');
    Route::delete('/{id}/destroy', 'ActividadController@destroy')->name('actividades.destroy');
});

Route::group(['prefix' => 'actividadam', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmActividadController@index')->name('actividadam.index');
    Route::get('/show/{id}', 'AmActividadController@show')->name('actividadam.show');
    Route::get('/create/{id}', 'AmActividadController@create')->name('actividadam.create');
    Route::post('/store', 'AmActividadController@store')->name('actividadam.store');
    Route::put('/{id}/update', 'AmActividadController@update')->name('actividadam.update');
    Route::get('/{id}/edit', 'AmActividadController@edit')->name('actividadam.edit');
    Route::delete('/{id}/destroy', 'AmActividadController@destroy')->name('actividadam.destroy');
});

//  programas adulto mayor

Route::group(['prefix' => 'programas', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'ProgramaAMController@index')->name('programas.index');
    Route::get('/create', 'ProgramaAMController@create')->name('programas.create');
    Route::post('/store', 'ProgramaAMController@store')->name('programas.store');
    Route::put('/{id}/update', 'ProgramaAMController@update')->name('programas.update');
    Route::get('/{id}/edit', 'ProgramaAMController@edit')->name('programas.edit');
    Route::delete('/{id}/destroy', 'ProgramaAMController@destroy')->name('programas.destroy');
});

//  tabla relacion programa - adulto mayor

Route::group(['prefix' => 'amprograma', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmProgramaController@index')->name('amprograma.index');
    Route::get('/show/{id}', 'AmProgramaController@show')->name('amprograma.show');
    Route::get('/create/{id}', 'AmProgramaController@create')->name('amprograma.create');
    Route::post('/store', 'AmProgramaController@store')->name('amprograma.store');
    Route::put('/{id}/update', 'AmProgramaController@update')->name('amprograma.update');
    Route::get('/{id}/edit', 'AmProgramaController@edit')->name('amprograma.edit');
    ROute::delete('/{id}/destroy', 'AmProgramaController@destroy')->name('amprograma.destroy');
});

Route::group(['prefix' => 'ayudastecnicas', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AyudaTecnicaController@index')->name('ayudastecnicas.index');
    Route::get('/create', 'AyudaTecnicaController@create')->name('ayudastecnicas.create');
    Route::post('/store', 'AyudaTecnicaController@store')->name('ayudastecnicas.store');
    Route::put('/{id}/update', 'AyudaTecnicaController@update')->name('ayudastecnicas.update');
    Route::get('/{id}/edit', 'AyudaTecnicaController@edit')->name('ayudastecnicas.edit');
    Route::delete('/{id}/destroy', 'AyudaTecnicaController@destroy')->name('ayudastecnicas.destroy');
});

Route::group(['prefix' => 'amayudastecnica', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmAyudaTecnicaController@index')->name('amayudastecnica.index');
    Route::get('/show/{id}', 'AmAyudaTecnicaController@show')->name('amayudastecnica.show');
    Route::get('/create/{id}', 'AmAyudaTecnicaController@create')->name('amayudastecnica.create');
    Route::post('/store', 'AmAyudaTecnicaController@store')->name('amayudastecnica.store');
    Route::put('/{id}/update', 'AmAyudaTecnicaController@update')->name('amayudastecnica.update');
    Route::get('/{id}/edit', 'AmAyudaTecnicaController@edit')->name('amayudastecnica.edit');
    Route::delete('/{id}/destroy', 'AmAyudaTecnicaController@destroy')->name('amayudastecnica.destroy');
});

Route::group(['prefix' => 'atenciones', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AtencionController@index')->name('atenciones.index');
    Route::get('/create', 'AtencionController@create')->name('atenciones.create');
    Route::post('/store', 'AtencionController@store')->name('atenciones.store');
    Route::put('/{id}/update', 'AtencionController@update')->name('atenciones.update');
    Route::get('/{id}/edit', 'AtencionController@edit')->name('atenciones.edit');
    Route::delete('/{id}/destroy', 'AtencionController@destroy')->name('atenciones.destroy');
});

Route::group(['prefix' => 'atencionesam', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmAtencionController@index')->name('atencionesam.index');
    Route::get('/show/{id}', 'AmAtencionController@show')->name('atencionesam.show');
    Route::get('/create/{id}', 'AmAtencionController@create')->name('atencionesam.create');
    Route::post('/store', 'AmAtencionController@store')->name('atencionesam.store');
    Route::put('/{id}/update', 'AmAtencionController@update')->name('atencionesam.update');
    Route::get('/{id}/edit', 'AmAtencionController@edit')->name('atencionesam.edit');
    Route::delete('/{id}/destroy', 'AmAtencionController@destroy')->name('atencionesam.destroy');
});

Route::group(['prefix' => 'serviciosbasicos', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'ServicioBasicoController@index')->name('serviciosbasicos.index');
    Route::get('/create', 'ServicioBasicoController@create')->name('serviciosbasicos.create');
    Route::post('/store', 'ServicioBasicoController@store')->name('serviciosbasicos.store');
    Route::put('/{id}/update', 'ServicioBasicoController@update')->name('serviciosbasicos.update');
    Route::get('/{id}/edit', 'ServicioBasicoController@edit')->name('serviciosbasicos.edit');
    Route::delete('/{id}/destroy', 'ServicioBasicoController@destroy')->name('serviciosbasicos.destroy');
});

Route::group(['prefix' => 'trabajosbano', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'TrabajoBanoController@index')->name('trabajosbano.index');
    Route::get('/create', 'TrabajoBanoController@create')->name('trabajosbano.create');
    Route::post('/store', 'TrabajoBanoController@store')->name('trabajosbano.store');
    Route::put('/{id}/update', 'TrabajoBanoController@update')->name('trabajosbano.update');
    Route::get('/{id}/edit', 'TrabajoBanoController@edit')->name('trabajosbano.edit');
    Route::delete('/{id}/destroy', 'TrabajoBanoController@destroy')->name('trabajosbano.destroy');
});

Route::group(['prefix' => 'trabajosbanoam', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'AmTrabajoBanoController@index')->name('trabajosbanoam.index');
    Route::get('/show/{id}', 'AmTrabajoBanoController@show')->name('trabajosbanoam.show');
    Route::get('/create/{id}', 'AmTrabajoBanoController@create')->name('trabajosbanoam.create');
    Route::post('/store', 'AmTrabajoBanoController@store')->name('trabajosbanoam.store');
    Route::put('/{id}/update', 'AmTrabajoBanoController@update')->name('trabajosbanoam.update');
    Route::get('/{id}/edit', 'AmTrabajoBanoController@edit')->name('trabajosbanoam.edit');
    Route::delete('/{id}/destroy', 'AmTrabajoBanoController@destroy')->name('trabajosbanoam.destroy');
});

//  beneficios estatales
Route::group(['prefix' => 'beneficios', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'BeneficioEstatalController@index')->name('beneficios.index');
    Route::get('/create', 'BeneficioEstatalController@create')->name('beneficios.create');
    Route::post('/store', 'BeneficioEstatalController@store')->name('beneficios.store');
    Route::put('/{id}/update', 'BeneficioEstatalController@update')->name('beneficios.update');
    Route::get('/{id}/edit', 'BeneficioEstatalController@edit')->name('beneficios.edit');
    Route::delete('/{id}/destroy', 'BeneficioEstatalController@destroy')->name('beneficios.destroy');
});

//  beneficios estatales - psd

Route::group(['prefix' => 'beneficiopsd', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'BeneficioEstatalPSDController@index')->name('beneficiopsd.index');
    Route::get('/show/{id}', 'BeneficioEstatalPSDController@show')->name('beneficiopsd.show');
    Route::get('/create/{id}', 'BeneficioEstatalPSDController@create')->name('beneficiopsd.create');
    Route::post('/store', 'BeneficioEstatalPSDController@store')->name('beneficiopsd.store');
    Route::put('/{id}/update', 'BeneficioEstatalPSDController@update')->name('beneficiopsd.update');
    Route::get('/{id}/edit', 'BeneficioEstatalPSDController@edit')->name('beneficiopsd.edit');
    Route::delete('/{id}/destroy', 'BeneficioEstatalPSDController@destroy')->name('beneficiopsd.destroy');
});

//  discapacidad psd

Route::group(['prefix' => 'discapacidadpsd', 'middleware' => ['auth', sprintf('role:%s, ', \App\Role::ADMIN.'|'.\App\Role::GESTOR)]], function() {
    Route::get('/', 'DiscapacidadPSDController@index')->name('discapacidadpsd.index');
    Route::get('/show/{id}', 'DiscapacidadPSDController@show')->name('discapacidadpsd.show');
    Route::get('/create/{id}', 'DiscapacidadPSDController@create')->name('discapacidadpsd.create');
    Route::post('/store', 'DiscapacidadPSDController@store')->name('discapacidadpsd.store');
    Route::put('/{id}/update', 'DiscapacidadPSDController@update')->name('discapacidadpsd.update');
    Route::get('/{id}/edit', 'DiscapacidadPSDController@edit')->name('discapacidadpsd.edit');
    Route::delete('/{id}/destroy', 'DiscapacidadPSDController@destroy')->name('discapacidadpsd.destroy');
});


// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
//   ]);

// Route::get('/home', 'HomeController@index')->name('home');

//  construimos la ruta para acceder a las imagenes utilizando Intervention
Route::get('/images/{path}/{attachment}', function ($path, $attachment) {

    $file = sprintf('storage/%s/%s', $path, $attachment);
    //  comprobamos si la imagen existe
    if ( File::exists( $file ) ) {
        return Image::make($file)->response();
    }
});
