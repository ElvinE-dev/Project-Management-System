<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'show']);
Route::get('/projects/members', [ProjectController::class, 'getMembers']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::post('/projects/{id}', [ProjectController::class, 'delete']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);

Route::get('/user/{id}',[UserController::class, 'getUser']);
Route::get('/users',[UserController::class, 'getUsersData']);
Route::post('/conversation',[ChatController::class, 'createConversation']);
Route::post('/conversations',[ChatController::class, 'getConversations']);