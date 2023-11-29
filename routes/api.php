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
    Route::get('student', 'App\Http\Controllers\StudentController@index');
    Route::post('student', 'App\Http\Controllers\StudentController@store');
    Route::get('student/{id}', 'App\Http\Controllers\StudentController@show');
    Route::put('student/{id}', 'App\Http\Controllers\StudentController@update');
    Route::delete('student/{id}', 'App\Http\Controllers\StudentController@destroy');
});

Route::group(['middleware' => 'api'], static function(){
    Route::get('muscular-group', 'App\Http\Controllers\MuscularGroupController@index');
    Route::post('muscular-group', 'App\Http\Controllers\MuscularGroupController@store');
    Route::get('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@show');
    Route::get('muscular-group/{id}/exercises', 'App\Http\Controllers\MuscularGroupController@showExercises');
    Route::put('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@update');
    Route::delete('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@destroy');
});

Route::group(['middleware' => 'api'], static function(){
    Route::get('exercise', 'App\Http\Controllers\ExercisesController@index');
    Route::post('exercise', 'App\Http\Controllers\ExercisesController@store');
    Route::get('exercise/{id}', 'App\Http\Controllers\ExercisesController@show');
    Route::put('exercise/{id}', 'App\Http\Controllers\ExercisesController@update');
    Route::delete('exercise/{id}', 'App\Http\Controllers\ExercisesController@destroy');
});

Route::group(['middleware' => 'api'], static function(){
    Route::get('training-sheet', 'App\Http\Controllers\TrainingSheetController@index');
    Route::post('training-sheet', 'App\Http\Controllers\TrainingSheetController@store');
    Route::get('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@show');
    Route::put('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@update');
    Route::delete('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@destroy');
});
