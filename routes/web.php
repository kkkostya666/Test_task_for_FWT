<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\TaskController;
use \App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/create', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.delete');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
