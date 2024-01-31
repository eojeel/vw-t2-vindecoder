<?php

use App\Models\Vin;
use Livewire\Livewire;
use App\Livewire\VinList;

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
        ->assertSee($firstVin->cc)
        ->assertDontSee($eleventhVin->cc);

    // Test the second page
    Livewire::test(VinList::class)
        ->call('nextPage')
        ->assertSee($eleventhVin->cc)
        ->assertDontSee($firstVin->cc);
});
