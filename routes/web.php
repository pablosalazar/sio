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


Auth::routes();



Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'HomeController@index');

// Perfil

    Route::get('profile', 'ProfileController@showProfile')->name('profile');
    Route::post('profile', 'ProfileController@saveProfile')->name('profile');    

// Supervisores
    Route::resource('supervisores', 'SupervisorController', ['parameters' => [
        'supervisores' => 'employee'
    ]]);

// Contratos
    Route::get('contratos','Contract\ContractController@list');

    Route::resource('{employee}/contratos','Contract\ContractController', ['parameters' => [
        'contratos' => 'contract'
    ]]);
  
// Funcionarios
    
    Route::get('funcionarios/exportar', 'Employee\EmployeeExportController@exportar_contratistas');
    Route::get('funcionarios/exportar_nivel_academico', 'Employee\EmployeeExportController@exportar_nivel_academico');

    Route::resource('funcionarios', 'Employee\EmployeeController', ['parameters' => [
        'funcionarios' => 'employee',
    ]]);


// Usuarios
    Route::post('usuarios/{user}/cambiar-password', 'UserController@changePassword', ['parameters' => [
        'usuarios' => 'user',
    ]])->name('usuarios.cambiar-password');

    Route::resource('usuarios', 'UserController', ['parameters' => [
        'usuarios' => 'user',
    ]]);

// Roles
    Route::resource('roles', 'RoleController', ['parameters' => [
        'roles' => 'role',
    ]]);

// Aprendices
    Route::get('aprendices/importar', 'Student\StudentUploadsController@showImportForm');
    Route::post('aprendices/importar', 'Student\StudentUploadsController@import')->name('aprendices/importar');
    Route::get('aprendices/subir-imagenes', 'Student\StudentUploadsController@showUploadForm');
    
    Route::resource('aprendices', 'Student\StudentController', ['parameters' => [
        'aprendices' => 'student',
    ]]);

// Areas
    Route::resource('areas', 'AreaController', ['parameters' => [
        'areas' => 'area',
    ]]);

// Programas
    Route::resource('programas', 'ProgramController', ['parameters' => [
        'programas' => 'program',
    ]]);

// Fichas
    Route::resource('fichas', 'CourseController', ['parameters' => [
        'fichas' => 'course',
    ]]);

// Ambientes
    Route::resource('ambientes', 'ClassroomController', ['parameters' => [
        'ambientes' => 'classroom',
    ]]);

// Porteria
    Route::get('porteria/busqueda-manual', 'SecurityController@index')->name('busqueda-manual');
    Route::get('porteria/busqueda-por-codigo-de-barras', 'SecurityController@searchByBarcode')->name('busqueda-por-codigo-de-barras');
    Route::post('porteria/buscar', 'SecurityController@search');

//  Contratos - Documentos
    Route::get('contratista/contrato/{id}/acta-inicio', ['as' => 'contrato/acta-inicio', 'uses' => 'Contract\ContractDocumentController@acta_inicio']);
    Route::get('contratista/contrato/{id}/acta-idoneidad', ['as' => 'contrato/acta-idoneidad', 'uses' => 'Contract\ContractDocumentController@acta_idoneidad']);
    Route::get('contratista/contrato/{id}/minuta', ['as' => 'contrato/minuta', 'uses' => 'Contract\ContractDocumentController@minuta']);

//  Contratos - Excel
    Route::get('contrato/exportar', ['as' => 'contrato/exportar', 'uses' => 'Contract\ContractExportController@export']);
   

// Metodo para migrar informacion del anterior SICO
    Route::get('migracion', "MigrateController@migrateData");
    Route::get('migracion/imagenes', "MigrateController@createThumbnails");

});


