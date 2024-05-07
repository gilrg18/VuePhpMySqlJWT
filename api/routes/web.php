<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'createUser'])->name('user.create');

Route::get('/user', [UserController::class, 'storeUser'])->name('user.store');