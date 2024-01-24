<?php

use App\Livewire\VinForm;
use App\Models\Colors;
use Livewire\Livewire;

it('can display the vin page', function () {
    $this->get('/')
        ->assertSeeLivewire(VinForm::class);
});

it('can retrieve all colours', function () {

    $colors = Colors::factory()->count(3)->create();

    Livewire::test(VinForm::class)
        ->assertViewHas('colors', function ($colors) {
            return count($colors) == 3;
        });

});
