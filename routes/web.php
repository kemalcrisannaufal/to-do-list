<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubTaskController;



Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth:web');
Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/profile/edit/{id}', [UserController::class, 'update'])->middleware('auth');

Route::get('/', [TaskController::class, 'index'])->middleware('auth:web');
Route::get('/add-task', [TaskController::class, 'create'])->middleware('auth:web');
Route::post('/add-task', [TaskController::class, 'store'])->middleware('auth:web');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware('auth:web');
Route::put('/task/{id}', [TaskController::class, 'update'])->middleware('auth:web');


Route::get('/add-subtask/{id}', [SubTaskController::class, 'create'])->middleware('auth:web');
Route::post('/add-subtask/{id}', [SubTaskController::class, 'store'])->middleware('auth:web');
Route::delete('/subtask/{id}', [SubTaskController::class, 'destroy'])->middleware('auth:web');
Route::put('/subtask/{id}', [SubTaskController::class, 'update'])->middleware('auth:web');
