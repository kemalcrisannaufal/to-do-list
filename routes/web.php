<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubTaskController;



Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/profile/edit/{id}', [UserController::class, 'update'])->middleware('auth');

Route::get('/', [TaskController::class, 'index'])->middleware('auth');
Route::get('/add-task', [TaskController::class, 'create'])->middleware('auth');
Route::post('/add-task', [TaskController::class, 'store'])->middleware('auth');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware('auth');
Route::put('/task/{id}', [TaskController::class, 'update'])->middleware('auth');


Route::get('/add-subtask/{id}', [SubTaskController::class, 'create'])->middleware('auth');
Route::post('/add-subtask/{id}', [SubTaskController::class, 'store'])->middleware('auth');
Route::delete('/subtask/{id}', [SubTaskController::class, 'destroy'])->middleware('auth');
Route::put('/subtask/{id}', [SubTaskController::class, 'update'])->middleware('auth');
