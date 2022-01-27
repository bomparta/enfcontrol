<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/actividad', 'ActividadController@index')->name('actividad');
Route::get('/listado', 'ActividadController@indexactividad')->name('listadoactividad');

Route::get('/reporte', 'ReporteController@index')->name('reporte');

Route::get('/estudiante', 'EstudianteController@index')->name('listadoestudiante');
