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

Route::get('/schedule', 'ScheduleManagerController@getSchedule');

Route::get('/schedule/days', 'ScheduleManagerController@getDays');

Route::get('/schedule/timeframes', 'ScheduleManagerController@getAvailableTimeframes');

Route::get('/schedule/get/timeframes', 'ScheduleManagerController@getScheduleTimeframes');

Route::get('/schedule/get/classes', 'ScheduleManagerController@getClassesForTimeframe');

Route::get('/schedule/get/students', 'ScheduleManagerController@getStudentsAvailable');

Route::get('/schedule/subjects', 'ScheduleManagerController@getClassSubjects');

Route::get('/schedule/instructors', 'ScheduleManagerController@getAvailableInstructors');



