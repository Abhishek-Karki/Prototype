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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('groups', 'Group\\GroupsController');
Route::resource('majors', 'Major\\MajorsController');
Route::resource('modules', 'Module\\ModulesController');
Route::resource('students', 'Student\\StudentsController');
Route::resource('major-module', 'MajorModule\\MajorModuleController');
//Route::get('/home/{username}', 'HomeController@index');


Route::get('import-group','FileController@importGroup');
Route::post('import-group-into-db','FileController@importGroupIntoDB');
Route::get('import-major','FileController@importMajor');
Route::post('import-major-into-db','FileController@importMajorIntoDB');
Route::get('import-module','FileController@importModule');
Route::post('import-module-into-db','FileController@importModuleIntoDB');
Route::get('import-student','FileController@importStudent');
Route::post('import-student-into-db','FileController@importStudentIntoDB');

//Route::get('major-module/{id}','MajorModuleController@majorModules');
Route::post('majormodule/{majorId}/{moduleId}',[
    'as' => 'destroyModule',
    'uses' => 'MajorModule\\MajorModuleController@customDestroy']);

Route::get('majormodule/{majorId}',[
    'as' => 'createModule',
    'uses' => 'MajorModule\\MajorModuleController@createMajorModules']);
//Route::get('major-module')