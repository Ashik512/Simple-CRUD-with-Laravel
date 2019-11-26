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
Route::get('/student', 'StudentController@index')->name('student');
Route::post('/savestudent', 'StudentController@store');
Route::get('editstudent/{id}', 'StudentController@edit');
Route::post('updatestudent/{id}', 'StudentController@update');
Route::get('deletestudent/{id}', 'StudentController@destroy');

