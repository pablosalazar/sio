<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('employees/{employee?}', 'API\EmployeeController@get');

Route::get('course/{course?}', 'API\CourseController@get');

Route::post('aprendices/subir-imagenes', 'Student\StudentUploadsController@upload')->name('subir-imagenes');