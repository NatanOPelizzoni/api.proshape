<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], static function(){
    Route::post('register','App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('profile', 'App\Http\Controllers\AuthController@profile');
});

Route::group(['middleware' => 'api'], static function(){
    Route::get('students', 'App\Http\Controllers\StudentController@index');
    Route::post('students', 'App\Http\Controllers\StudentController@store');
    Route::get('students/{id}', 'App\Http\Controllers\StudentController@show');
    Route::put('students/{id}', 'App\Http\Controllers\StudentController@update');
    Route::delete('students/{id}', 'App\Http\Controllers\StudentController@destroy');
});
