<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\User;
use App\Http\Controllers\Todo;
use Dotenv\Util\Regex;

Route::get('/', HomeController::class)->name('home');

Route::get('/login', LoginController::class)->name('login');

Route::get('/signup', SignupController::class)->name('signup');

Route::prefix('/user')
    ->as('user.')
    ->group(function() {

        Route::post('/login', User\LoginController::class)->name('login');

        Route::post('/create', User\CreateController::class)->name('create');
    });

Route::prefix('/todo')
    ->as('todo.')
    ->group(function () {

        Route::get('/', Todo\IndexController::class)->name('index');

        Route::get('/new', Todo\NewController::class)->name('new');

        Route::get('/edit/{id}', Todo\EditController::class)->name('edit');

        Route::post('/create', Todo\CreateController::class)->name('create');

        Route::put('/update', Todo\UpdateController::class)->name('update');

        Route::delete('/delete', Todo\DeleteController::class)->name('delete');
    });
