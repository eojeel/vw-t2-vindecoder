<?php

use Illuminate\Support\Str;
use App\Livewire\VinForm;
use App\Livewire\VinShow;
use Livewire\Livewire;
use App\Models\Vin;

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
        ->set('form.cc', $vinDetails->cc)
        ->set('form.mmmmm', $vinDetails->mmmmm)
        ->set('form.pp', $vinDetails->pp)
        ->set('form.mmmm', $vinDetails->mmmm)
        ->set('form.dd', $vinDetails->dd)
        ->set('form.uu', $vinDetails->uu)
        ->set('form.ee', $vinDetails->ee)
        ->set('form.tt', $vinDetails->tt)
        ->call('save')
        ->assertHasNoErrors();
});

it('dispatches BusColour event', function () {

    $vinDetails = Vin::factory()->create(['pp' => 'J2J252']);

    Livewire::test(VinForm::class)
        ->set('form.cc', $vinDetails->cc)
        ->set('form.mmmmm', $vinDetails->mmmmm)
        ->set('form.pp', $vinDetails->pp)
        ->set('form.mmmm', $vinDetails->mmmm)
        ->set('form.dd', $vinDetails->dd)
        ->set('form.uu', $vinDetails->uu)
        ->set('form.ee', $vinDetails->ee)
        ->set('form.tt', $vinDetails->tt)
        ->call('save')
        ->assertDispatched('BusColour');
});

it('can handle vindetails', function () {

    $vinDetails = Vin::factory()->create();

    $firstVin = $vinDetails->first();

    Livewire::test(VinShow::class, ['chassisNumber' => Str::replace(' ', '', $firstVin->cc)])
        ->assertSet('cc', $firstVin->cc)
        ->assertSet('mmmmm', $firstVin->mmmmm)
        ->assertSet('pp', $firstVin->pp)
        ->assertSet('mmmm', $firstVin->mmmm)
        ->assertSet('dd', $firstVin->dd)
        ->assertSet('uu', $firstVin->uu)
        ->assertSet('ee', $firstVin->ee)
        ->assertSet('tt', $firstVin->tt);
});
