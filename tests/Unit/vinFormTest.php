<?php

use App\Livewire\VinForm;
use App\Models\Vin;
use Livewire\Livewire;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->seed();
});

//test that it validates the cc field
it('Errors on invalid input', function () {
    livewire(VinForm::class)
        ->set('cc', '12 123 12')
        ->set('mmmmm', '123 123 123 12')
        ->set('pp', '1234567')
        ->set('mmmm', '123 123 123 12')
        ->set('dd', '12 ')
        ->set('uu', '123')
        ->set('ee', '1')
        ->set('tt', '1234 1')
        ->call('save')
        ->assertHasErrors([
            'cc' => 'regex',
            'mmmmm' => 'regex',
            'pp' => 'size',
            'mmmm' => 'regex',
            'dd' => 'regex',
            'uu' => 'size',
            'ee' => 'size',
            'tt' => 'regex',
        ]);
});

//test that it validates the cc field
it('Validates form input', function () {

    $vinDetails = Vin::factory()->create();

    livewire(VinForm::class)
        ->set('cc', $vinDetails['cc'])
        ->set('mmmmm', $vinDetails['mmmmm'])
        ->set('pp', $vinDetails['pp'])
        ->set('mmmm', $vinDetails['mmmm'])
        ->set('dd', $vinDetails['dd'])
        ->set('uu', $vinDetails['uu'])
        ->set('ee', $vinDetails['ee'])
        ->set('tt', $vinDetails['tt'])
        ->call('save')
        ->assertHasNoErrors();
});

it('dispatches BusColour event', function () {

    $vinDetails = Vin::factory()->create();

    Livewire::test(VinForm::class)
        ->set('cc', $vinDetails['cc'])
        ->set('mmmmm', $vinDetails['mmmmm'])
        ->set('pp', $vinDetails['pp'])
        ->set('mmmm', $vinDetails['mmmm'])
        ->set('dd', $vinDetails['dd'])
        ->set('uu', $vinDetails['uu'])
        ->set('ee', $vinDetails['ee'])
        ->set('tt', $vinDetails['tt'])
        ->call('save')
        ->assertDispatched('BusColour');
});

it('can handle vindetails', function () {

    $vinDetails = Vin::factory()->create();

    Livewire::test(VinForm::class, ['vindetails' => $vinDetails])
        ->assertSet('cc', '12 123 123')
        ->assertSet('mmmmm', '123 123 123 123 123')
        ->assertSet('pp', 'J2J252')
        ->assertSet('mmmm', '123 123 123 123')
        ->assertSet('dd', '12 1')
        ->assertSet('uu', '1234')
        ->assertSet('ee', '11')
        ->assertSet('tt', '1234 11');
});
