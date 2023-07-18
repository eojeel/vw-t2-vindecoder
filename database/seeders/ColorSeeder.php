<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            ['name' => 'Savannah beige', 'hex_code' => '#93866d'],
            ['name' => 'Lotus white', 'hex_code' => '#e4dec3'],
            ['name' => 'Ivory', 'hex_code' => '#fff7bd'],
            ['name' => 'Cloud white', 'hex_code' => '#ffffff'],
            ['name' => 'Neptune blue', 'hex_code' => '#3a515b'],
            ['name' => 'Montana red', 'hex_code' => '#8a1202'],
            ['name' => 'Brilliant blue', 'hex_code' => '#597589'],
            ['name' => 'Delta green', 'hex_code' => '#202f2a'],
            ['name' => 'Sierra yellow', 'hex_code' => '#b2772b'],
            ['name' => 'Niagra blue', 'hex_code' => '#63879d'],
            ['name' => 'Chianti red', 'hex_code' => '#730502'],
            ['name' => 'Pastel white', 'hex_code' => '#e8e4c8'],
            ['name' => 'Elm green', 'hex_code' => '#273828'],
            ['name' => 'Kansas beige', 'hex_code' => '#bfb394'],
            ['name' => 'Kasan red', 'hex_code' => '#a1261c'],
            ['name' => 'Orient blue', 'hex_code' => '#2b4d73'],
            ['name' => 'Ceylon beige', 'hex_code' => '#b8a971'],
            ['name' => 'Sumatra green', 'hex_code' => '#23392a'],
            ['name' => 'Brilliant orange', 'hex_code' => '#b1421a'],
            ['name' => 'Bali yellow', 'hex_code' => '#b8c53f'],
            ['name' => 'Sage green', 'hex_code' => '#75910f'],
            ['name' => 'Marino yellow', 'hex_code' => '#d5980b'],
            ['name' => 'Senegal red', 'hex_code' => '#c10300'],
            ['name' => 'Reef blue', 'hex_code' => '#005b77'],
            ['name' => 'Diamond silver', 'hex_code' => '#a6b1ad'],
            ['name' => 'Atlas white', 'hex_code' => '#fef5d5'],
            ['name' => 'Agate brown', 'hex_code' => '#473730'],
            ['name' => 'Dakota beige', 'hex_code' => '#cabe7a'],
            ['name' => 'Red fox', 'hex_code' => '#842500'],
            ['name' => 'Date Nut brown', 'hex_code' => '#301100'],
            ['name' => 'Panama brown', 'hex_code' => '#a46909'],
            ['name' => 'Mexico beige', 'hex_code' => '#bba970'],
        ]);
    }
}
