<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('categories', CategoryController::class);

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks', 'index')->name('tasks.index');

    Route::post('/tasks', 'store')->name('tasks.store');

    Route::get('/tasks/create', 'create')->name('tasks.create');

    Route::get('/tasks/{task}', 'show')->name('tasks.show')
        ->can('view', 'task');

    Route::put('/tasks/{task}', 'update')->name('tasks.update')
        ->can('edit', 'task');

    Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy')
        ->can('edit', 'task');

    Route::get('/tasks/{task}/edit', 'edit')->name('tasks.edit')
        ->can('edit', 'task');

    Route::patch('/tasks/{task}', 'toggleComplete')->name('tasks.toggle-complete')
        ->can('edit', 'task');
})->middleware('auth');

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')
        ->name('register');

    Route::post('/register', 'store');
})->middleware('guest');

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'create')
        ->name('login')
        ->middleware('guest');

    Route::post('/login', 'store')
        ->middleware('guest');

    Route::delete('/logout', 'destroy')
        ->name('logout')
        ->middleware('auth');
});


