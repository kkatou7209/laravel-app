<?php

use App\Http\Controllers\Api\Todo\ToggleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function() {

    Route::prefix('/todo')
        ->as('todo.')
        ->group(function() {

            Route::put('/toggle', ToggleController::class)->name('toggle');
        });
});
