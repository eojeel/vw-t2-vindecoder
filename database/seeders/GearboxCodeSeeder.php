<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GearboxCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gearboxCode = [
            [
                'gearbox_code' => 1,
                'gearbox_description' => 'Manual transmission, 4-speed',
                'm_codes' => '',
                'years' => '1968,1969,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979',
            ],
            [
                'gearbox_code' => 3,
                'gearbox_description' => 'Automatic transmission, 3-speed',
                'm_codes' => '249',
                'years' => '1973,1974,1975,1976,1977,1978,1979',
            ],
        ];

        DB::table('gearbox_code')->insert($gearboxCode);
    }
}
