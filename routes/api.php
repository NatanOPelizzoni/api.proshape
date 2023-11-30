<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['api']], function () {
    Route::post('auth/register','App\Http\Controllers\AuthController@register');
    Route::post('auth/login', 'App\Http\Controllers\AuthController@login');
});

Route::group(['middleware' => ['jwt.auth', 'api']], function () {
    Route::post('auth/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('auth/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('auth/profile', 'App\Http\Controllers\AuthController@profile');

    Route::get('student', 'App\Http\Controllers\StudentController@index');
    Route::post('student', 'App\Http\Controllers\StudentController@store');
    Route::get('student/{id}', 'App\Http\Controllers\StudentController@show');
    Route::put('student/{id}', 'App\Http\Controllers\StudentController@update');
    Route::delete('student/{id}', 'App\Http\Controllers\StudentController@destroy');

    Route::get('muscular-group', 'App\Http\Controllers\MuscularGroupController@index');
    Route::post('muscular-group', 'App\Http\Controllers\MuscularGroupController@store');
    Route::get('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@show');
    Route::get('muscular-group/{id}/exercises', 'App\Http\Controllers\MuscularGroupController@showExercises');
    Route::put('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@update');
    Route::delete('muscular-group/{id}', 'App\Http\Controllers\MuscularGroupController@destroy');

    Route::get('exercise', 'App\Http\Controllers\ExercisesController@index');
    Route::post('exercise', 'App\Http\Controllers\ExercisesController@store');
    Route::get('exercise/{id}', 'App\Http\Controllers\ExercisesController@show');
    Route::put('exercise/{id}', 'App\Http\Controllers\ExercisesController@update');
    Route::delete('exercise/{id}', 'App\Http\Controllers\ExercisesController@destroy');

    Route::get('training-sheet', 'App\Http\Controllers\TrainingSheetController@index');
    Route::post('training-sheet', 'App\Http\Controllers\TrainingSheetController@store');
    Route::get('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@show');
    Route::put('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@update');
    Route::delete('training-sheet/{id}', 'App\Http\Controllers\TrainingSheetController@destroy');

    Route::get('exercise-training-sheet', 'App\Http\Controllers\ExerciseTrainingSheetController@index');
    Route::post('exercise-training-sheet', 'App\Http\Controllers\ExerciseTrainingSheetController@store');
    Route::get('exercise-training-sheet/{id}', 'App\Http\Controllers\ExerciseTrainingSheetController@show');
    Route::put('exercise-training-sheet/{id}', 'App\Http\Controllers\ExerciseTrainingSheetController@update');
    Route::delete('exercise-training-sheet/{id}', 'App\Http\Controllers\ExerciseTrainingSheetController@destroy');
});
