<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BladeIconApiController;

Route::get('/', BladeIconApiController::class)
    ->middleware('api-auth-check');
