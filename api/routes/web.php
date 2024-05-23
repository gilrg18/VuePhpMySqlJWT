<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'createUser'])->name('user.create');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
// Route::post('/user', [UserController::class, 'storeUser'])->name('user.store');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

//middleware 'is_admin' should be in routeMiddleWare array in Kernel.php
Route::middleware(['is_admin'])->group(function () {
    

    Route::get('/user/{user}/edit', [UserController::class, 'editUser'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'updateUser'])->name('user.update');

    Route::delete('/user/{user}/delete', [UserController::class, 'deleteUser'])->name('user.delete');
    // Add other routes that need the same middleware
});