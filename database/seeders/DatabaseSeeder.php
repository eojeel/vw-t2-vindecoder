<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\McodeSeeder;
use Database\Seeders\PaintCodesSeeder;
use Database\Seeders\InteriorCodeSeeder;
use Database\Seeders\ExportDestinationSeeder;
use Database\Seeders\ModelEngineGearboxSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ColorSeeder::class,
            McodeSeeder::class,
            PaintCodesSeeder::class,
            InteriorCodeSeeder::class,
            ExportDestinationSeeder::class,
            ModelEngineGearboxSeeder::class,
        ]);
    }
}
