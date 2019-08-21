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

# Homepage
Route::get('/', function () {
    return view('welcome');
});
# Student CRUD
Route::resource('/student','StudentController');
# Filter Results	
Route::get('/student-filter','StudentController@getStudentsByFilter');
# Consume Api
Route::get('/consume-api', 'StudentController@getActivities');