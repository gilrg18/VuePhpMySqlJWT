<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'createUser'])->name('user.create');

Route::post('/user', [UserController::class, 'storeUser'])->name('user.store');

Route::get('/user/{user}/edit', [UserController::class, 'editUser'])->name('user.edit');

Route::put('/user/{user}/update', [UserController::class, 'updateUser'])->name('user.update');