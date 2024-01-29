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
            $exists = DB::table('vins')
                ->where('cc', $this->formatNumericString($row['chassis_number_short']))
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('vins')->insert([
                'cc' => $this->formatNumericString($row['chassis_number_short']),
                'mmmmm' => $row['m_codes_1'],
                'mmmm' => $row['m_codes_2'],
                'pp' => $row['paint_and_interior_code'],
                'dd' => Str::substr($row['production_date_code'], 0, 2).' '.Str::substr($row['production_date_code'], 2),
                'uu' => $row['production_planned'],
                'ee' => $row['export_destination_code'],
                'tt' => $row['model_code'].' '.$row['aggregate_code'],
            ]);

        }
    }
}
