<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaintCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace the following with the actual path to the CSV file
        $handle = fopen(storage_path('seeddata/paintcodes.csv'), 'r');

        $header = [];
        $data = [];

        $header = fgetcsv($handle, 1000, ',');
        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            $data[] = array_combine($header, array_pad($row, count($header), null));
        }
        fclose($handle);

        foreach ($data as $row) {
            DB::table('paint_codes')->insert([
                'plate_code' => $row['Plate code'],
                'color_code' => $row['Color code'],
                'german_name' => $row['German name'],
                'english_name' => $row['English name'],
                'remarks' => $row['Remarks'],
            ]);
        }
    }
}
