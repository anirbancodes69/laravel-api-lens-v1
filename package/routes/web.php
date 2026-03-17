<?php

use Illuminate\Support\Facades\Route;
use ApiLens\Laravel\Http\Controllers\DashboardController;

Route::get('/apilens', [DashboardController::class, 'index']);