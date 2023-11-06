<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineCodeSeeder extends Seeder
{
    public function run(): void
    {
        $engineCodes = [
            [
                'engine_code' => 0,
                'engine_type' => 'Type 4',
                'fuel_induction' => 'Fuel injection (L-Jetronic)',
                'm_codes' => '062,157,608',
                'years' => '1976,1977,1978,1979',
            ],
            [
                'engine_code' => 1,
                'engine_type' => 'Type 1',
                'fuel_induction' => 'Single carburetor',
                'm_codes' => '',
                'years' => '1968,1969,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979',
            ],
            [
                'engine_code' => 2,
                'engine_type' => 'Type 1',
                'fuel_induction' => 'Single carburetor',
                'm_codes' => '157',
                'years' => '1968,1969,1970,1971',
            ],
            [
                'engine_code' => 5,
                'engine_type' => 'Type 1',
                'fuel_induction' => 'Single carburetor',
                'm_codes' => '',
                'years' => '',
            ],
            [
                'engine_code' => 6,
                'engine_type' => 'Type 4',
                'fuel_induction' => 'Fuel injection (L-Jetronic)',
                'm_codes' => '249',
                'years' => '1974,1975,1976,1977,1978,1979',
            ],
        ];

        DB::table('engine_code')->insert($engineCodes);
    }
}
