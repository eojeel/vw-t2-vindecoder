<?php

use App\Models\Colors;

it('can display the homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertViewIs('welcome');
    $response->assertViewHas('colors');
});

it('can retrieve all colours', function () {
    $colors = Colors::factory()->count(3)->create();

    $response = $this->get('/');

    expect($response->viewData('colors'))->toHaveCount($colors->count());
});
