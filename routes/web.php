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
Route::resource('configuraciones', 'ConfiguracionController');
Route::resource('enfermeros', 'EnfermeroController');
Route::resource('localidades', 'LocalidadesController');
Route::resource('pacientes', 'PacienteController');
Route::resource('paises', 'PaisesController');
Route::resource('provincias', 'ProvinciasController');
Route::resource('recepcionistas', 'RecepcionistaController');
Route::resource('usuarios', 'UserController');
Route::put('usuarios/actpass/{usuarios}', 'UserController@actPass');
Route::put('usuarios/actconf/{usuarios}', 'UserController@actConf');
