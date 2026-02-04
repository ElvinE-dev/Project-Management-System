<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

Route::get('/projects', function () {
    return Inertia::render('Projects');
});
Route::get('/members', function () {
    return Inertia::render('Members');
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});