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
        ->set('form.chassis_number', '12 123 12')
        ->call('save')
        ->assertHasErrors([
            'form.chassis_number' => 'The Chassis Number field format is invalid.',
        ]);
});

//test that it validates the chassis_number field
it('Validates form input', function () {

    $vinDetails = Vin::factory()->create();

    livewire::test(VinForm::class)
        ->set('form.chassis_number', $vinDetails->chassis_number)
        ->set('form.mcode_1', $vinDetails->mcode_1)
        ->set('form.paint_interior', $vinDetails->paint_interior)
        ->set('form.mcode_2', $vinDetails->mcode_2)
        ->set('form.model_year', $vinDetails->model_year)
        ->set('form.production_plan', $vinDetails->production_plan)
        ->set('form.export_destination', $vinDetails->export_destination)
        ->set('form.body_engine_model', $vinDetails->body_engine_model)
        ->call('save')
        ->assertHasNoErrors();
});

it('dispatches BusColour event', function () {

    $vinDetails = Vin::factory()->create(['paint_interior' => 'J2J252']);

    Livewire::test(VinForm::class)
        ->set('form.chassis_number', $vinDetails->chassis_number)
        ->set('form.mcode_1', $vinDetails->mcode_1)
        ->set('form.paint_interior', $vinDetails->paint_interior)
        ->set('form.mcode_2', $vinDetails->mcode_2)
        ->set('form.model_year', $vinDetails->model_year)
        ->set('form.production_plan', $vinDetails->production_plan)
        ->set('form.export_destination', $vinDetails->export_destination)
        ->set('form.body_engine_model', $vinDetails->body_engine_model)
        ->call('save')
        ->assertDispatched('buscolour');
});

it('can handle vindetails', function () {

    $vinDetails = Vin::factory()->create();

    $firstVin = $vinDetails->first();

    Livewire::test(VinShow::class, ['chassisNumber' => Str::replace(' ', '', $firstVin->chassis_number)])
        ->assertSet('chassis_number', $firstVin->chassis_number)
        ->assertSet('mcode_1', $firstVin->mcode_1)
        ->assertSet('paint_interior', $firstVin->paint_interior)
        ->assertSet('mcode_2', $firstVin->mcode_2)
        ->assertSet('model_year', $firstVin->model_year)
        ->assertSet('production_plan', $firstVin->production_plan)
        ->assertSet('export_destination', $firstVin->export_destination)
        ->assertSet('body_engine_model', $firstVin->body_engine_model);
});
