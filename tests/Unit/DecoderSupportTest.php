<?php

use App\Enums\Transmission;
use App\Models\ModelEngineGearbox;
use App\Services\VinDecoder;
use App\Support\ChassisNumber;
use App\Support\ProductionDate;
use Illuminate\Support\Carbon;

it('reads the model year from the first digit of the chassis number', function (string $chassisNumber, ?string $year) {
    expect(ChassisNumber::year($chassisNumber))->toBe($year);
})->with([
    ['01 123 456', '1970'],
    ['52 021 474', '1975'],
    ['92 051 695', '1979'],
    ['X2 021 474', null],
    ['', null],
]);

it('formats the production date from a week and day code', function () {
    Carbon::setTestNow('2026-01-01');

    // weeks up to 43 belong to the year before the model year
    expect(ProductionDate::format('37 1', '1975'))->toBe('Monday 9th of September 1974')
        ->and(ProductionDate::format('44 1', '1975'))->toBe('Tuesday 28th of October 1975')
        ->and(ProductionDate::format('37 1', null))->toBe('');
});

it('labels each transmission', function () {
    expect(Transmission::from('M')->label())->toBe('4 Speed Manual')
        ->and(Transmission::from('A')->label())->toBe('4 Speed Automatic')
        ->and(Transmission::tryFrom('X'))->toBeNull();
});

it('returns no engine details for an unknown body code', function () {
    expect(ModelEngineGearbox::detailsFor('9999 99'))->toBe([]);
});

it('decodes a vin without any reference data', function () {
    $results = app(VinDecoder::class)->decode([
        'chassis_number'     => '52 021 474',
        'mcode_1'            => '',
        'mcode_2'            => '100 161',
        'paint_interior'     => 'J6J651',
        'model_year'         => '37 1',
        'production_plan'    => '7474',
        'export_destination' => 'OR',
        'body_engine_model'  => '2110 11',
    ]);

    expect($results->chassisNumber)->toBe('1975')
        ->and($results->mCode1)->toBeEmpty()
        ->and($results->colorDisplay)->toBeEmpty()
        ->and($results->destination)->toBe('')
        ->and($results->engineTrans)->toBe([]);
});
