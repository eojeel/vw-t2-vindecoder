<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['code' => 'L620', 'name' => 'Savanna beige', 'hex_code' => '#93866d'],
            ['code' => 'L282', 'name' => 'Lotus white', 'hex_code' => '#e4dec3'],
            ['code' => 'L567', 'name' => 'Ivory', 'hex_code' => '#fff7bd'],
            ['code' => 'L581', 'name' => 'Cloud white', 'hex_code' => '#ffffff'],
            ['code' => 'L50K', 'name' => 'Neptune blue', 'hex_code' => '#3a515b'],
            ['code' => 'L30H', 'name' => 'Montana red', 'hex_code' => '#8a1202'],
            ['code' => 'L50H', 'name' => 'Brilliant blue', 'hex_code' => '#597589'],
            ['code' => 'L610', 'name' => 'Delta green', 'hex_code' => '#202f2a'],
            ['code' => 'L11H', 'name' => 'Sierra yellow', 'hex_code' => '#b2772b'],
            ['code' => 'L53D', 'name' => 'Niagra blue', 'hex_code' => '#63879d'],
            ['code' => 'L31H', 'name' => 'Chianti red', 'hex_code' => '#730502'],
            ['code' => 'L90D', 'name' => 'Pastel white', 'hex_code' => '#e8e4c8'],
            ['code' => 'L60D', 'name' => 'Elm green', 'hex_code' => '#273828'],
            ['code' => 'L91D', 'name' => 'Kansas beige', 'hex_code' => '#bfb394'],
            ['code' => 'L30B', 'name' => 'Kasan red', 'hex_code' => '#a1261c'],
            ['code' => 'L53H', 'name' => 'Orient blue', 'hex_code' => '#2b4d73'],
            ['code' => 'L13H', 'name' => 'Ceylon beige', 'hex_code' => '#b8a971'],
            ['code' => 'L61B', 'name' => 'Sumatra green', 'hex_code' => '#23392a'],
            ['code' => 'L20B', 'name' => 'Brilliant orange', 'hex_code' => '#b1421a'],
            ['code' => 'L62H', 'name' => 'Bali yellow', 'hex_code' => '#b8c53f'],
            ['code' => 'L63H', 'name' => 'Sage green', 'hex_code' => '#75910f'],
            ['code' => 'L20A', 'name' => 'Marino yellow', 'hex_code' => '#d5980b'],
            ['code' => 'L31A', 'name' => 'Senegal red', 'hex_code' => '#c10300'],
            ['code' => 'L57H', 'name' => 'Reef blue', 'hex_code' => '#005b77'],
            ['code' => '?', 'name' => 'Diamond silver', 'hex_code' => '#a6b1ad'],
            ['code' => '?', 'name' => 'Atlas white', 'hex_code' => '#fef5d5'],
            ['code' => 'L86Z', 'name' => 'Agate brown', 'hex_code' => '#473730'],
            ['code' => 'L13A', 'name' => 'Dakota beige', 'hex_code' => '#cabe7a'],
            ['code' => '', 'name' => 'Red fox', 'hex_code' => '#842500'],
            ['code' => 'LH8A', 'name' => 'Date Nut brown', 'hex_code' => '#301100'],
            ['code' => 'L12A', 'name' => 'Panama brown', 'hex_code' => '#a46909'],
            ['code' => 'LE1M', 'name' => 'Mexico beige', 'hex_code' => '#bba970'],
        ];

        DB::table('colors')->insert($colors);
    }
}
