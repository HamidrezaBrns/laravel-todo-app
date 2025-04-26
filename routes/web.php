<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}', [TaskController::class, 'toggleComplete'])
    ->name('tasks.toggle-complete');

//Route::middleware('auth')->group(function () {
//    Route::controller(TaskController::class)->group(function () {
//        Route::get('/tasks', 'index')->name('tasks.index');
//        Route::post('/tasks', 'store')->name('tasks.store');
//        Route::get('/tasks/create', 'create')->name('tasks.create');
//        Route::get('/tasks/{task}', 'show')->name('tasks.show')
//            ->can('view', 'task');
//        Route::put('/tasks/{task}', 'update')->name('tasks.update')
//            ->can('edit', 'task');
//        Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy')
//            ->can('edit', 'task');
//        Route::get('/tasks/{task}/edit', 'edit')->name('tasks.edit')
//            ->can('edit', 'task');
//    });
//    Route::patch('/tasks/{task}', function (Task $task) {
//        $task->toggleComplete();
//
//        return redirect()->back();
//    })->name('tasks.toggle-complete');
//
//
//    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy']);
//});
//
//
//Route::middleware('guest')->group(function () {
//    Route::get('/register', [RegisteredUserController::class, 'create']);
//    Route::post('/register', [RegisteredUserController::class, 'store']);
//
//    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//});


