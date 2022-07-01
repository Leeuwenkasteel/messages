<?php

use Illuminate\Support\Facades\Route;
use Leeuwenkasteel\Messages\Http\Controllers\NotifyController;

Route::middleware('web')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::resource('notifications', NotifyController::class);
    });
});