<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('categories', CategoryController::class)
    ->except(['edit', 'update'])
    ->middleware('auth');

Route::resource('tasks', TaskController::class)
    ->middleware('auth');
Route::patch('/tasks/{task}', [TaskController::class, 'toggleComplete'])
    ->middleware('auth');

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->name('register');

    Route::post('/register', 'store');
})->middleware('guest');

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login')
        ->middleware('guest');

    Route::post('/login', 'store')
        ->middleware('guest');

    Route::delete('/logout', 'destroy')->name('logout')
        ->middleware('auth');
});


