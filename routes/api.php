<?php

use \App\Http\Controllers as Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/users', [Controllers\Api\UserController::class, 'index']);
Route::get('/users/{id}', [Controllers\Api\UserController::class, 'show']);
Route::post('/users', [Controllers\Api\UserController::class, 'store'])->middleware('throttle:10');
Route::put('/users/{id}', [Controllers\Api\UserController::class, 'update'])->middleware('throttle:1,2');
Route::delete('/users/{id}', [Controllers\Api\UserController::class, 'destroy'])->middleware('throttle:40');


