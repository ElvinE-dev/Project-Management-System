<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::get('/login', function () {
    return Inertia::render('Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('auth');

Route::get('/projects', function () {
    return Inertia::render('Projects');
})->middleware('auth');

Route::get('/members', function () {
    return Inertia::render('Members');
})->middleware('auth');

Route::get('/settings', function () {
    return Inertia::render('Settings');
})->middleware('auth');

Route::get('/chats', function () {
    return Inertia::render('Chats');
})->middleware('auth');

Route::post('/login', [LoginController::class, 'login']);