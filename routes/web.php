<?php

use App\Livewire\VinForm;
use App\Livewire\VinList;
use App\Livewire\VinShow;
use Illuminate\Support\Facades\Route;

Route::get('/', VinForm::class);

Route::get('/vin/{chassisNumber}', VinShow::class);

Route::get('/vins', VinList::class);
