<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(['prefix' => '/user/payment'], function () {
    Route::post('save', [ UserController::class, 'save' ]);
    Route::get('all', [ UserController::class, 'all' ]);
});
