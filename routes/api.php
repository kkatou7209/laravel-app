<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function() {

    Route::prefix('/todo')
        ->as('todo.')
        ->group(function() {

            Route::get('/toggle', function() {

                return ['test' => 'API TEST'];
            })->name('toggle');
        });
});
