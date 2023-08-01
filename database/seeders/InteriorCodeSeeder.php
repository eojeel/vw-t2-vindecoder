<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteriorCodeSeeder extends Seeder
{
    public function run(): void
    {
        // Replace the following with the actual path to the CSV file
        $handle = fopen(storage_path('seeddata/interiorcodes.csv'), 'r');

        $header = [];
        $data = [];

        $header = fgetcsv($handle, 1000, ',');
        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            $data[] = array_combine($header, array_pad($row, count($header), null));
        }
        fclose($handle);

        foreach ($data as $row) {
            DB::table('interior_code')->insert([
                'code' => $row['VW code'],
                'material' => $row['Material'],
                'german_name' => $row['German name'],
                'english_name' => $row['English Name'],
                'remarks' => $row['Remarks'],
            ]);
        }
    }
}
