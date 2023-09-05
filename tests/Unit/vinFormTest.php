<?php

use App\Livewire\VinForm;
use Livewire\Livewire;

use function Pest\Livewire\livewire;

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

    livewire(VinForm::class)
        ->set('cc', '12 123 123')
        ->set('mmmmm', '123 123 123 123 123')
        ->set('pp', 'j2j252')
        ->set('mmmm', '123 123 123 123')
        ->set('dd', '12 1')
        ->set('uu', '1234')
        ->set('ee', '11')
        ->set('tt', '1234 11')
        ->call('save')
        ->assertHasNoErrors();
});

it('dispatches BusColour event', function () {
    Livewire::test(VinForm::class)
        ->set('cc', '12 123 123')
        ->set('mmmmm', '123 123 123 123 123')
        ->set('pp', 'j2j252')
        ->set('mmmm', '123 123 123 123')
        ->set('dd', '12 1')
        ->set('uu', '1234')
        ->set('ee', '11')
        ->set('tt', '1234 11')
        ->call('save')
        ->assertDispatched('BusColour');
});
