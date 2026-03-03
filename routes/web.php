<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Models\Conversation;
use App\Models\User;
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

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/chats/{conversation}', function(Conversation $conversation){

    $user_id = auth()->id();

    if($user_id !== $conversation->sender_id && $user_id !== $conversation->receiver_id) return abort(403);
    return Inertia::render('Chats', [
        'data' => $conversation,
        'messages' => $conversation->messages()->latest()->get(),
        'opponent' => User::getDataFromId(auth()->id() === $conversation->sender_id ? $conversation->receiver_id : $conversation->sender_id),
    ]);
})->middleware('auth');

Route::post('/chat/{conversation}',[ChatController::class, 'store'])->middleware('auth');
