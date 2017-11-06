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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('/schedule', 'ScheduleManager@getSchedule');

Route::get('/schedule/days', 'ScheduleManager@getDays');

Route::get('/schedule/timeframes', 'ScheduleManager@getAvailableTimeframes');

Route::get('/schedule/get/timeframes', 'ScheduleManager@getScheduleTimeframes');

Route::get('/schedule/get/classes', 'ScheduleManager@getClassesForTimeframe');

Route::get('/schedule/get/students', 'ScheduleManager@getStudentsAvailable');

Route::get('/schedule/subjects', 'ScheduleManager@getClassSubjects');

Route::get('/schedule/instructors', 'ScheduleManager@getAvailableInstructors');



