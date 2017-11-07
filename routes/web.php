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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('instructor', 'InstructorController', ['except' => ['show']]);

Route::resource('subject', 'SubjectController', ['except' => ['show']]);

Route::resource('student', 'StudentController', ['except' => ['show']]);

Route::resource('timeframe', 'TimeframeController', ['except' => ['show']]);

Route::get('/class/assign', 'ClassScheduleController@assign')->name('assign');

Route::post('/class/assign', 'ClassScheduleController@assignStore')->name('assign_store');

Route::get('/class/student/{id}', 'ClassScheduleController@classStudentList')->name('class_student');

Route::delete('/class/student/{id}', 'ClassScheduleController@removeStudent')->name('remove_student');

Route::resource('class', 'ClassScheduleController', ['except' => ['show']]);










