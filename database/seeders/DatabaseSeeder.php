<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

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
            EngineCodeSeeder::class,
            GearboxCodeSeeder::class,
        ]);
    }
}
