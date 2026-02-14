<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::post('/projects/{id}', [ProjectController::class, 'delete']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);

Route::get('/users',[UserController::class, 'getUsersData']);