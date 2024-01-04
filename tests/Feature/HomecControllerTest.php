<?php

use App\Livewire\VinForm;
use App\Models\Colors;

it('can display the vin page', function () {
    $this->get('/')
        ->assertSeeLivewire(VinForm::class);
});

it('can retrieve all colours', function () {
    $colors = Colors::factory()->count(3)->create();

    $response = $this->get('/');

    expect($response->viewData('colors'))->toHaveCount($colors->count());
});
