<?php

use App\Livewire\VinForm;
use App\Livewire\VinList;
use App\Livewire\VinShow;
use Illuminate\Support\Facades\Route;

Route::get('/', VinForm::class)->name('home');

Route::get('/vin/{chassisNumber}', VinShow::class)->name('vin');

Route::get('/vins', VinList::class)->name('vins');
