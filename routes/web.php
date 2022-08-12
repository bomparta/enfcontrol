<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/logout', function () {
    return view('auth/login');
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

Route::get('/planificacion', 'Oferta_AcademicaController@index')->name('planificacion');
Route::get('/oferta_add', 'Oferta_AcademicaController@create')->name('oferta_add');
Route::get('/docente', 'DocenteController@list_docente')->name('docente');
Route::get('/docente_add', 'DocenteController@create')->name('docente_add');
Route::get('/pensum', 'PensumController@index')->name('pensum');
Route::get('/listaprograma', 'ProgramaController@index')->name('listaprograma');
Route::get('/listapensum/{id}', 'PensumController@list')->name('listapensum');
///control de expedientes RRHH
Route::get('/rrhh', 'RrhhController@index')->name('rrhh');
Route::get('/rrhh/movimientos', 'RrhhController@create')->name('movimientosrrhh');
Route::get('reportes/rrhh', 'RrhhController@reporterrhh')->name('reportesrrhh');
Route::get('/rrhh/funcionario/planillarrhh', 'RrhhController@planillarrhh')->name('planillarrhh');



Route::get('/rrhh/funcionario', 'FuncionarioController@index')->name('funcionario');
Route::get('/rrhh/funcionario/datos', 'FuncionarioController@create')->name('datosfuncionario');
Route::get('/rrhh/funcionario/datosedit', 'FuncionarioController@edit')->name('buscarfuncionario');
Route::post('/rrhh/funcionario/datos', 'FuncionarioController@store')->name('funcionariostore');
Route::post('/rrhh/funcionario/datosedit', 'FuncionarioController@updatedatospersonales')->name('funcionarioupdate');
Route::get('/rrhh/funcionario/direccion', 'FuncionarioController@createdireccion')->name('direccionfuncionario');
Route::post('/rrhh/funcionario/direccion', 'FuncionarioController@updatedireccion')->name('updatedireccion');

Route::post('/rrhh/funcionario/submunicipio_fun', 'FuncionarioController@submunicipio')->name('submunicipio_fun');
Route::post('/rrhh/funcionario/subparroquia_fun','FuncionarioController@subparroquia')->name('subparroquia_fun');

Route::get('/rrhh/funcionario/hist_medico', 'FuncionarioController@createhist_medico')->name('hist_medicofuncionario');
Route::post('/rrhh/funcionario/hist_medico', 'FuncionarioController@updatehist_medico')->name('updatehist_medico');

Route::get('/rrhh/funcionario/cta_bancaria', 'FuncionarioController@createbanco')->name('bancofuncionario');
Route::post('/rrhh/funcionario/cta_bancaria', 'FuncionarioController@storebanco')->name('storecuentas');
Route::get('/rrhh/funcionario/cta_bancariaedit/{id}', 'FuncionarioController@editbanco')->name('editarcuentas');
Route::post('/rrhh/funcionario/cta_bancariaedit', 'FuncionarioController@updatebanco')->name('actualizarcuentas');

Route::get('/rrhh/funcionario/experiencia', 'FuncionarioController@createxperiencia')->name('laboralfuncionario');
Route::post('/rrhh/funcionario/experiencia', 'FuncionarioController@storexperiencia')->name('laboralregistrar');
Route::get('/rrhh/funcionario/experiencia_edit/{id}', 'FuncionarioController@editexperiencia')->name('editarlaboral');
Route::post('/rrhh/funcionario/experiencia_edit', 'FuncionarioController@updatexperiencia')->name('actualizarlaboral');
Route::get('/rrhh/funcionario/creardocumento_laboral/{tipo_documento}/{id_laboral}/{ir}', 'FuncionarioController@requisito_laboral')->name('requisitoslaboral');
Route::post('/rrhh/funcionario/creardocumeto_laboral', 'FuncionarioController@subirArchivo_laboral')->name('subirarchivo_laboral');

Route::get('/rrhh/funcionario/educacion', 'FuncionarioController@createducacion')->name('educacionfuncionario');
Route::post('/rrhh/funcionario/educacion', 'FuncionarioController@storeducacion')->name('registrareducacion');
Route::get('/rrhh/funcionario/educacion_edit', 'FuncionarioController@editeducacion')->name('editeducacion');
Route::post('/rrhh/funcionario/educacion_edit', 'FuncionarioController@updateducacion')->name('actualizareducacion');

Route::get('/rrhh/funcionario/estudios_act', 'FuncionarioController@createstudios_act')->name('estudios_actfuncionario');
Route::post('/rrhh/funcionario/estudios_act', 'FuncionarioController@updatestudios_act')->name('registrarestudios_act');

Route::get('/rrhh/funcionario/cursos', 'FuncionarioController@createcursos')->name('cursos_funcionario');
Route::post('/rrhh/funcionario/cursos', 'FuncionarioController@storecursos')->name('cursosregistrar');

Route::get('/rrhh/funcionario/cursos_edit/{id}', 'FuncionarioController@editcursos')->name('editar_funcionario');
Route::post('/rrhh/funcionario/cursos_edit', 'FuncionarioController@updatecursos')->name('actualizarcursos');
Route::get('/rrhh/funcionario/creardocumento_curso/{tipo_documento}/{id_curso}/{ir}', 'FuncionarioController@requisito_cursos')->name('requisitoscurso');
Route::post('/rrhh/funcionario/creardocumeto_curso', 'FuncionarioController@subirArchivo_cursos')->name('subirarchivo_curso');

Route::get('/rrhh/funcionario/idiomas', 'FuncionarioController@createidiomas')->name('idiomas_funcionario');
Route::post('/rrhh/funcionario/idiomas', 'FuncionarioController@storeidiomas')->name('idiomasregistrar');
Route::get('/rrhh/funcionario/idiomas_edit/{id}', 'FuncionarioController@editidiomas')->name('editaridiomas');
Route::post('/rrhh/funcionario/idiomas_edit', 'FuncionarioController@updateidiomas')->name('actualizaridiomas');

Route::get('/rrhh/funcionario/familiar', 'FuncionarioController@createfamiliar')->name('familiarfuncionario');
Route::post('/rrhh/funcionario/familiar', 'FuncionarioController@storefamiliar')->name('registrarfamiliar');
Route::get('/rrhh/funcionario/familiar_edit/{id}', 'FuncionarioController@editfamiliar');
Route::post('/rrhh/funcionario/familiar_edit', 'FuncionarioController@updatefamiliar')->name('actualizarfamiliar');
Route::get('/rrhh/funcionario/creardocumento_familiar/{tipo_documento}/{id_familiar}/{ir}', 'FuncionarioController@requisito_familiar')->name('requisitosfamiliar');
Route::post('/rrhh/funcionario/creardocumeto_familiar', 'FuncionarioController@subirArchivo_familiar')->name('subirarchivo_familiar');


Route::get('/rrhh/funcionario/requisitos', 'FuncionarioController@datosadjunto')->name('requisitos');
Route::get('/rrhh/funcionario/creardocumeto/{tipo_documento}', 'FuncionarioController@creardocumento')->name('creardocumento');
Route::post('/rrhh/funcionario/creardocumeto', 'FuncionarioController@subirArchivo')->name('subirarchivo');


///administrador
Route::get('/adm', 'AdministracionController@index')->name('adm');

// BIENES NACIONALES
Route::get('/bienes_nacionales/homebienes', 'BienesController@home')->name('menubienes');

Route::get('/bienes_nacionales/listado_bienes', 'BienesController@index')->name('bienes');
Route::get('/bienes_nacionales/bienes', 'BienesController@create')->name('crearbienes');
Route::post('/bienes_nacionales/bienes', 'BienesController@store')->name('registrar_bienes');
Route::get('/bienes_nacionales/bienes_edit/{id}', 'BienesController@edit')->name('verbien');
Route::post('/bienes_nacionales/bienes_edit', 'BienesController@update')->name('actualizarbien');

Route::get('/bienes_nacionales/listado_bienes_mov', 'BienesController@movimientos')->name('mov_bienes');
Route::get('/bienes_nacionales/listado_bienes_mov_todos', 'BienesController@movimientos_todos')->name('todos_mov_bienes');
Route::get('/bienes_nacionales/bienesmov/{id}/{id_bien}', 'BienesController@createmov')->name('crear_mov_bienes');
Route::post('/bienes_nacionales/bienes_mov', 'BienesController@storemov')->name('registrar_mov_bienes');
Route::get('/bienes_nacionales/bienes_mov_edit/{id}', 'BienesController@editmov')->name('editar_mov_bienes');
Route::post('/bienes_nacionales/bienes_mov_edit', 'BienesController@updatemov')->name('actualizar_mov_bienes');




Route::get('/bienes_nacionales/listado_bienes_desin', 'BienesController@list_desincorporar')->name('desin_bienes');
Route::get('/bienes_nacionales/bienes_desin/{id}/{id_bien}', 'BienesController@createdesin')->name('crear_desin_bienes');
Route::post('/bienes_nacionales/bienes_desin', 'BienesController@storedesin')->name('registrar_desin_bienes');
Route::get('/bienes_nacionales/listado_bienes_desin_todos', 'BienesController@desincorporados_todos')->name('todos_desin_bienes');

Route::get('/bienes_nacionales/menu_reportes', 'BienesController@reportes')->name('reportes_bienes');
Route::get('/bienes_nacionales/reportes/ficha', 'BienesController@ficha')->name('ficha');
Route::get('/bienes_nacionales/reportes/activos', 'BienesController@activos')->name('activos');
Route::get('/bienes_nacionales/reportes/desincorporados', 'BienesController@desincorporados')->name('desincorporados');
Route::get('/bienes_nacionales/reportes/bienes_adm', 'BienesController@buscaradm')->name('adm');
Route::get('/bienes/searchredirect', function(){
     
    /* Nuevo: si el argumento search está vacío regresar a la página anterior */
    if (empty(Input::get('search'))) return redirect()->back();
    
    $search = urlencode(e(Input::get('search')));
    $route = "/bienes_nacionales/bienes_adm/$search";
    return redirect($route);
});
Route::get("/bienes_nacionales/bienes_adm/{search}", "BienesController@search");