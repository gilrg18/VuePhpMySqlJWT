<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/user', [UserController::class, 'storeUser'])->name('user.store');
//Route::get('/login', [UserController::class, 'login'])->name('user.login');
//Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
//Login endpoint
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

//getAllUsers endpoint
Route::middleware(['authenticated'])->group(function () {
    Route::get('/getUsers', [UserController::class, 'getUsers'])->name('user.index');
});

//middleware 'is_admin' should be in routeMiddleWare array in Kernel.php
Route::middleware(['authenticated','is_admin'])->group(function () {
    //Route::get('/user/create', [UserController::class, 'createUser'])->name('user.create');

    //register endpoint
    Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

    //Route::get('/user/{user}/edit', [UserController::class, 'editUser'])->name('user.edit');
    
    //update endpoint
    Route::put('/user/{user}/update', [UserController::class, 'updateUser'])->name('user.update');

    //delete enpoint
    Route::delete('/user/{user}/delete', [UserController::class, 'deleteUser'])->name('user.delete');
});