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
Route::get('/creactividad', 'ActividadController@create')->name('crearactividad');
Route::get('/listado', 'ActividadController@indexactividad')->name('listadoactividad');
Route::get('/actividad/edit/{id}', 'ActividadController@edit')->name('editactividad');
Route::post('/actividad/update/{id}', 'ActividadController@update');
Route::resource('/parametros/actividad', ActividadController::class);


Route::get('/actuacion', 'ActuacionController@index')->name('actuacion');
Route::get('/actuacion/create/{id}', 'ActuacionController@create')->name('crearactuacion');
Route::get('/actuacion/edit/{id}', 'ActuacionController@edit')->name('editactuacion');
Route::post('/actuacion/update/{id}', 'ActuacionController@update');
Route::get('actuacion/contador', 'ActividadController@contador')->name('contador');
Route::get('/listadoactuacion/{id}', 'ActuacionController@get_actuaciones')->name('listadoactuacion');
Route::resource('/parametros/actuacion', ActuacionController::class);

Route::get('/participantes/{id}', 'ParticipantesController@index')->name('participante');
Route::get('/participantes/create/{id}', 'ParticipantesController@create')->name('agregar');
Route::get('/edit/{id_actuacion_participante}', 'ParticipantesController@edit')->name('editar');
Route::get('/delete/{id_actuacion_participante}', 'ParticipantesController@delete')->name('eliminar');

Route::get('/asistencias/{id}', 'AsistenciasController@index')->name('asistencias');

Route::get('/facilitadores/{id}', 'FacilitadoresController@index')->name('facilitadores');
Route::get('/facilitadores/create/{id}', 'FacilitadoresController@create')->name('agregar');
Route::get('/edit/{id_actuacion_facilitadores}', 'FacilitadoresController@edit')->name('editar');
Route::get('/delete/{id_actuacion_facilitadores}', 'FacilitadoresController@delete')->name('eliminar');

Route::get('/usuario', 'DashboardController@index')->name('usuario');
Route::get('/reporte', 'ReporteController@index')->name('reporte');
Route::get('/pdfconstancia', 'ReporteController@constancia')->name('constanciapdf');

Route::get('/dashboard', 'EstudianteController@dashboard')->name('dashboard');
Route::get('/estudiante', 'EstudianteController@index')->name('listadoestudiante');
Route::get('/estudiantedatos', 'EstudianteController@create')->name('datosestudiante');
Route::post('/estudiantestore', 'EstudianteController@store')->name('estudiantestore');
Route::get('/editestudiantedatos/{id}', 'EstudianteController@edit')->name('editdatosestudiante');
Route::get('/estudiantelist/{id}', 'EstudianteController@datoslistestudiante')->name('estudiantelist');
Route::get('/estudiantedireccion', 'EstudianteController@createdireccion')->name('direccionestudiante');
Route::get('/direccionlist/{id}', 'EstudianteController@direccionlistestudiante')->name('direccionlist');
Route::get('/estudianteexperiencia', 'EstudianteController@createxperiencia')->name('experienciaestudiante');
Route::get('/experiencialist/{id}', 'EstudianteController@experiencialistestudiante')->name('experiencialist');
Route::get('/estudianteexperienciadoc', 'EstudianteController@createxperienciadoc')->name('experienciadocente');
Route::get('/estudianteorganizacion', 'EstudianteController@createorganizacion')->name('organizacion');
Route::get('/estudianteprograma', 'EstudianteController@createprograma')->name('programa');
Route::get('/estatus/{id}', 'EstudianteController@indexestatus')->name('estatus');
Route::post('/datos_adjunto/{id}', 'EstudianteController@datosadjunto')->name('datos_adjunto');
Route::get('/adjunto_datos/{id}', 'EstudianteController@adjuntodatos')->name('adjunto_datos');
Route::get('/crearfoto', 'EstudianteController@crearfoto')->name('crearfoto');
Route::get('/crearcedula', 'EstudianteController@crearcedula')->name('crearcedula');
Route::get('/crearcurriculum', 'EstudianteController@crearcurriculum')->name('crearcurriculum');
Route::get('/crearcarta', 'EstudianteController@crearcarta')->name('crearcarta');
Route::get('/crearcarnetcolegiatura', 'EstudianteController@crearcarnetcolegiatura')->name('crearcarnetcolegiatura');
Route::get('/crearimpre', 'EstudianteController@crearimpre')->name('crearimpre');
Route::post('/subirfoto','EstudianteController@subirArchivo')->name('subirfoto');
Route::post('/subircedula','EstudianteController@subircedula')->name('subircedula');
Route::post('/subircurriculum','EstudianteController@subircurriculum')->name('subircurriculum');
Route::post('/subircarta','EstudianteController@subircarta')->name('subircarta');
Route::post('/subircarnetcolegiatura','EstudianteController@subircarnetcolegiatura')->name('subircarnetcolegiatura');
Route::post('/subirimpre','EstudianteController@subirimpre')->name('subirimpre');

Route::get('/reporte/capacidad_actividad_global/{codigo}', 'ReporteController@capacitados_actividad_global')->name('reporteactividaglobal');

Route::get('/control', 'AdminController@index')->name('admincontrol');

Route::get('/listadoadmin', 'AdministracionController@index')->name('listaconciliacion');
Route::get('/listconce', 'AdministracionController@get_list_conciliacion')->name('listconciliacion');
Route::get('/listconcerror', 'AdministracionController@get_list_conciliacion_error')->name('listaconciliacionerror');
Route::get('/listdocent', 'AdministracionController@get_list_docente')->name('listadocente');
Route::post('/adddocent', 'DocenteController@create')->name('adddocente');

Route::get('/listadomatdoc', 'DocenteController@index')->name('listamateriadoc');

Route::get('/listperiodo', 'PeriodoController@index')->name('listaPeriodo');
Route::get('/addperiod', 'PeriodoController@create')->name('addperiodo');
Route::post('/periodo', 'PeriodoController@store')->name('periodo.store');
Route::get('/edit/period/{id}', 'PeriodoController@edit')->name('editperiodo');
Route::post('/update/period/{id}', 'PeriodoController@update')->name('update.periodo');

Route::get('/gestor/usuario', 'UsuariosController@index')->name('gestor.usuario');
Route::get('/gestor/usuarios/{id}', 'UsuariosController@show')->name('usuarios.show');
Route::get('/gestore/usuarios/{id}', 'UsuariosController@edit')->name('usuarios.edit');
Route::put('/gestores/usuarios/{id}', 'UsuariosController@update')->name('usuarios.update');

Route::post('submunicipio', 'EstudianteController@submunicipio')->name('submunicipio');
Route::post('subparroquia','EstudianteController@subparroquia')->name('subparroquia');

<<<<<<< Updated upstream
Route::get('/planificacion', 'Oferta_AcademicaController@index')->name('planificacion');
Route::get('/oferta_add', 'Oferta_AcademicaController@create')->name('oferta_add');
Route::get('/docente', 'DocenteController@list_docente')->name('docente');
Route::get('/docente_add', 'DocenteController@create')->name('docente_add');
Route::get('/pensum', 'PensumController@index')->name('pensum');
Route::get('/listaprograma', 'ProgramaController@index')->name('listaprograma');
Route::get('/listapensum/{id}', 'PensumController@list')->name('listapensum');
=======
///control de expedientes RRHH
Route::get('/rrhh', 'RrhhController@index')->name('rrhh');
Route::get('/rrhh/funcionario', 'FuncionarioController@index')->name('funcionario');
Route::get('/rrhh/funcionario/datos', 'FuncionarioController@create')->name('datosfuncionario');
Route::post('/rrhh/funcionario/datos', 'FuncionarioController@store')->name('funcionariostore');
Route::get('/rrhh/funcionario/experiencia', 'FuncionarioController@createxperiencia')->name('laboralfuncionario');
//Route::get('/rrhh/funcionario/datosadjuntados{id}', 'FuncionarioController@adjuntodatos')->name('requisitosfuncionario');
>>>>>>> Stashed changes
