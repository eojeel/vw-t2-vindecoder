<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VinController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/vin/{chassisNumber}', [VinController::class, 'show'])->name('vin');
