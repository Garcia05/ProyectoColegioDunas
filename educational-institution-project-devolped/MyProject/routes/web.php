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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'admin'], function () {
    //---------PARA EL DOCENTE
    Route::view('/home/Formulario_Docente','registerDocente')->name('docentes.form');
    //Route::view('/home/Listado_Docente','indexDocente')->name('docentes.list');
    Route::get('/home/Listado_Docentes', 'HomeController@indexDocente')->name('docentes.list');
    Route::post('/home/Registrar_Docente','HomeController@saveDocente')->name('docentes.registro');
    Route::get('/home/Listado_Docente','HomeController@searchDocente')->name('docente.detalle');
    
    Route::get('/home/Cursos/{dni}/find', 'CursoController@find_cursos')->name('curso.detalle');
});

//---------PARA EL ALUMNO
Route::view('/home/Formulario_Alumno','registerAlumno')->name('alumnos.form');
Route::post('/home/Registrar_Alumno','HomeController@saveAlumno')->name('alumnos.registro');

Route::get('/home/Datos_Alumnos','HomeController@alumnoDatos')->name('alumno.datos');
Route::get('/home/Datos_Alumno','HomeController@searchAlumno')->name('alumno.detalle');


Route::get('/home/Notas_Alumnos/{dni_al}','NotaController@find_Alumno_Nota')->name('notas.detalle');
Route::put('/home/Datos_Al/{dni_al}','NotaController@updateDatosAlumno')->name('actualizar.datos');


// --------Notas del alumno
Route::view('/home/Formulario_Notas','registerNotas')->name('registerNotas.form');
Route::post('/home/Registrar_Notas','NotaController@store')->name('register.notas');

//---------PARA EL APODERADO
Route::view('/home/Formulario_Apoderado','registerApoderado')->name('apoderados.form');
Route::post('/home/Registrar_Apoderado','ApoderadoController@store')->name('apoderados.registro');
Route::get('/home/Listado_Apoderados', 'ApoderadoController@index')->name('apoderados.list');
Route::get('/home/Listado_Apoderados/{dni_apo}','HomeController@findAlumno')->name('apoderados.detalle');

//---------PARA EL CURSO
Route::view('/home/Formulario_Curso','registerCurso')->name('cursos.form');
Route::post('/home/Registrar_Curso','CursoController@store')->name('cursos.registro');
Route::get('/home/Cursos/{dni_do}', 'CursoController@index')->name('cursos.list');
Route::get('/home/Cursos/{identificador}/My', 'CursoController@index_my')->name('mycursos.list');
Route::get('/home/Cursos/{dni}/{id}', 'CursoController@add')->name('add.curso');
Route::get('/home/Cursos/delete/{dni}/{id}', 'CursoController@delete')->name('delete.curso');





Route::view('/home/Asignar_curso','asignarCurso')->name('cursos.asignar');
Route::post('/home/Registrar_asignacion', 'CursoController@update')->name('cursos.update');

Route::post('/home/Registrar_asignacionAlumno', 'CursoController@AsignarCurso')->name('lleva_cursos.update');

