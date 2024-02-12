<?php

use App\Livewire\About;
use App\Livewire\VinForm;
use App\Livewire\VinList;
use App\Livewire\VinShow;
use Illuminate\Support\Facades\Route;

Route::get('/', VinForm::class)->name('home');

Route::get('/lateBay', VinForm::class)->name('latebay');

Route::get('/earlybay', VinForm::class)->name('earlybay');

Route::get('/vin/{chassisNumber}', VinShow::class)->name('viewvin');

Route::get('/vins', VinList::class)->name('vinlist');

Route::get('/about', About::class)->name('about');
