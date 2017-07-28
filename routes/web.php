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
    return view('auth.login');
});

Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Auth\LoginController@logout']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {




    Route::get('/reloj', function () {
        return view('turnera.partes.reloj');
    });

    Route::get('/contenido_turnera', function () {
        return view('turnera.partes.tablas');
    });


    Route::get('/turnos_dia', 'TurnosController@index2')->name('turnos_dia');

    Route::get('/buscar_turnos', 'TurnosController@buscar_turnos')->name('buscar_turnos');

    Route::get('/turnera', 'TurnosController@turnera')->name('turnera');

    Route::resource('historias', 'HistoriaClinicaController');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('configuraciones', 'ConfiguracionController');
    Route::resource('enfermeros', 'EnfermerosController');
    Route::resource('localidades', 'LocalidadesController');
    Route::resource('pacientes', 'PacientesController');
    Route::resource('paises', 'PaisesController');
    Route::resource('medicos', 'MedicosController');
    
    
    
    Route::resource('factores', 'FactoresController');
    
    
    
    
    Route::resource('provincias', 'ProvinciasController');
    Route::resource('usuarios', 'UserController');
    Route::resource('obras_sociales', 'ObraSocialesController');
    Route::resource('medicamentos', 'MedicamentosController');
    Route::resource('consultorios', 'ConsultoriosController');
    Route::resource('feriados', 'FeriadosController');
    Route::resource('agendas', 'AgendasController');
    Route::resource('turnos', 'TurnosController');
    Route::put('usuarios/actpass/{usuarios}', 'UserController@actPass');
    Route::put('usuarios/actconf/{usuarios}', 'UserController@actConf');


    Route::resource('seguimientos', 'SeguimientosController');
    Route::resource('tratamientos', 'TratamientosController');
    Route::resource('complicaciones', 'ComplicacionesController');
    Route::resource('tratamientos_seguimiento', 'TratamientosSeguimientosController');
    Route::resource('valoraciones', 'ValoracionesController');
});





