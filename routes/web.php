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

Route::resource('instructor', 'InstructorController');

Route::resource('subject', 'SubjectController');

Route::resource('student', 'StudentController');

Route::resource('timeframe', 'TimeframeController');

Route::get('/class/assign', 'ClassStudentController@assign')->name('assign');

Route::post('/class/assign', 'ClassStudentController@assignStore')->name('assign_student');

Route::get('/class/student/{id}', 'ClassStudentController@index')->name('class_student');

Route::delete('/class/student/distroy/{id}', 'ClassStudentController@destroy')->name('class_destroy');

Route::resource('class', 'ClassScheduleController');




