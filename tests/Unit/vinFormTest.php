<?php

use App\Livewire\VinForm;
use App\Livewire\VinShow;
use App\Models\Vin;
use Illuminate\Support\Str;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed();
});

it('Errors on invalid input', function () {
    livewire::test(VinForm::class)
        ->set('form.cc', '12 123 12')
        ->call('save')
        ->assertHasErrors([
            'form.cc' => 'The Chassis Number field format is invalid.',
        ]);
});

//test that it validates the cc field
it('Validates form input', function () {

    $vinDetails = Vin::factory()->create();

    livewire::test(VinForm::class)
        ->set('form.cc', $vinDetails['cc'])
        ->set('form.mmmmm', $vinDetails['mmmmm'])
        ->set('form.pp', $vinDetails['pp'])
        ->set('form.mmmm', $vinDetails['mmmm'])
        ->set('form.dd', $vinDetails['dd'])
        ->set('form.uu', $vinDetails['uu'])
        ->set('form.ee', $vinDetails['ee'])
        ->set('form.tt', $vinDetails['tt'])
        ->call('save')
        ->assertHasNoErrors();
});

it('dispatches BusColour event', function () {

    $vinDetails = Vin::factory()->create();

    Livewire::test(VinForm::class)
        ->set('form.cc', $vinDetails['cc'])
        ->set('form.mmmmm', $vinDetails['mmmmm'])
        ->set('form.pp', $vinDetails['pp'])
        ->set('form.mmmm', $vinDetails['mmmm'])
        ->set('form.dd', $vinDetails['dd'])
        ->set('form.uu', $vinDetails['uu'])
        ->set('form.ee', $vinDetails['ee'])
        ->set('form.tt', $vinDetails['tt'])
        ->call('save')
        ->assertDispatched('BusColour');
});

it('can handle vindetails', function () {

    $vinDetails = Vin::factory()->create();

    Livewire::test(VinShow::class, ['chassisNumber' => Str::replace(' ', '', $vinDetails->cc)])
        ->assertSet('cc', '12 123 123')
        ->assertSet('mmmmm', '123 123 123 123 123')
        ->assertSet('pp', 'J2J252')
        ->assertSet('mmmm', '123 123 123 123')
        ->assertSet('dd', '12 1')
        ->assertSet('uu', '1234')
        ->assertSet('ee', '11')
        ->assertSet('tt', '1234 11');
});
