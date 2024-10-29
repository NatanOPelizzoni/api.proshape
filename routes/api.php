<?php

use App\Http\Controllers\BodyGroupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:sanctum'], function ($router) {
    // User Routes
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::patch('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::post('/user/massdelete', [UserController::class, 'massDelete']);

    // Body Group Routes
    Route::post('/body-group', [BodyGroupController::class, 'store']);
    Route::get('/body-group', [BodyGroupController::class, 'index']);
    Route::get('/body-group/{id}', [BodyGroupController::class, 'show']);
    Route::patch('/body-group/{id}', [BodyGroupController::class, 'update']);
    Route::delete('/body-group/{id}', [BodyGroupController::class, 'destroy']);
    Route::post('/body-group/massdelete', [BodyGroupController::class, 'massDelete']);
});
