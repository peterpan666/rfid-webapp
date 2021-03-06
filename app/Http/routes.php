<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::route('students.index');
});

Route::get('home', function () {
    return Redirect::to('/');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('students', 'StudentsController', ['except' => 'destroy']);

Route::post('classroom/store', 'ClassroomController@store');

Route::get('detections', function () {
    return \App\Detection::orderBy('created_at', 'DESC')->get();
});
