<?php

use App\Livewire\VinList;
use App\Models\Vin;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed();
});

it('can display vin list page', function () {

    Livewire::test(VinList::class)
        ->assertStatus(200);
});

it('can view vin list page', function () {

    // Create 30 posts (assuming 10 posts per page as default)
    $vinDetails = Vin::factory()->count(30)->create();

    // Grab the first and eleventh record for reference
    $firstVin = $vinDetails->first();
    $eleventhVin = $vinDetails->skip(10)->first();

    // Test initial state (first page)
    Livewire::test(VinList::class)
        ->assertSee($firstVin->chassis_number)
        ->assertDontSee($eleventhVin->chassis_number);

    // Test the second page
    Livewire::test(VinList::class)
        ->call('nextPage')
        ->assertSee($eleventhVin->chassis_number)
        ->assertDontSee($firstVin->chassis_number);
});
