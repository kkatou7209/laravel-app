<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function() {
    return view(('login'));
})->name('login');

Route::get('/signup', function() {
    return view(('signup'));
})->name('signup');

Route::prefix('/todo')
    ->as('todo.')
    ->group(function () {

        Route::get('/', function() {
            return view('todo.index');
        })->name('index');

        Route::get('/add', function () {
            return view('todo.add');
        })->name('add');

        Route::get('/edit', function () {
            return view('todo.edit');
        })->name('edit');
    });
