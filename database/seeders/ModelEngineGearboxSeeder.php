<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelEngineGearboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Replace the following with the actual path to the CSV file
         $handle = fopen(storage_path('seeddata/enginetrans.csv'), 'r');

         $header = [];
         $data = [];

         $header = fgetcsv($handle, 1000, ',');
         while (($row = fgetcsv($handle, 1000, ',')) !== false) {
             $data[] = array_combine($header, array_pad($row, count($header), null));
         }
         fclose($handle);

         foreach ($data as $row) {
             DB::table('model_engine_gearbox')->insert([
                 'model_id' => $row['Model'],
                 'sale_code' => $row['Sales code'],
                 'model_description' => $row['Model designation'],
                 'engine_spec' => $row['Engine Kw (BHP)'],
                 'transmission_type' => $row['T'],
                'engine_code' => (int)$row['Engine'],
                 'gearbox_code' => (int)$row['Transmission'],
                 'extras' => (int)$row['Extras'],
             ]);
         }
     }
    }
