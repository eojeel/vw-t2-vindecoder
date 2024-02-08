<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VinSeeder extends Seeder
{
    public function formatNumericString($string)
    {
        // Remove any existing spaces
        $string = str_replace(' ', '', $string);

        // Split the string into parts
        $part1 = substr($string, 0, 2);
        $part2 = substr($string, 2, 3);
        $part3 = substr($string, 5);

        // Combine parts with spaces
        return $part1.' '.$part2.' '.$part3;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace the following with the actual path to the CSV file
        $handle = fopen(storage_path('seeddata/mplates.csv'), 'r');

        $header = [];
        $data = [];

        $header = fgetcsv($handle, 1000, ',');
        while (($row = fgetcsv($handle, 1000, ',')) !== false) {

            if (! preg_match('/^[^0-9]/', $row[5])) {
                continue;
            }

            $data[] = array_combine($header, array_pad($row, count($header), null));
        }

        foreach ($data as $row) {

            // Check if the record already exists
            $exists = DB::table('vinsnew')
                ->where('chassis_number', $this->formatNumericString($row['chassis_number_short']))
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('vinsnew')->insert([
                'chassis_number' => $this->formatNumericString($row['chassis_number_short']),
                'mcode_1' => $row['m_codes_1'],
                'mcode_2' => $row['m_codes_2'],
                'paint_interior' => $row['paint_and_interior_code'],
                'model_year' => Str::substr($row['production_date_code'], 0, 2).' '.Str::substr($row['production_date_code'], 2),
                'production_plan' => $row['production_planned'],
                'export_destination' => $row['export_destination_code'],
                'body_engine_model' => $row['model_code'].' '.$row['aggregate_code'],
            ]);

        }
    }
}
