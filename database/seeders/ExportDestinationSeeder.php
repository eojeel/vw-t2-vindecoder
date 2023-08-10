<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExportDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            '4' => 'West-Germany,West-Berlin(?)',
            '6' => 'West-Germany (Local Unknown)',
            '10' => 'West-Germany (Local Unknown)',
            '11' => 'West-Germany,Recklinghousen(?)',
            '16' => 'West-Germany (Local Unknown)',
            '17' => 'West-Germany (Local Unknown)',
            '18' => 'West-Germany (Local Unknown)',
            '19' => 'West-Germany (Local Unknown)',
            '20' => 'West-Germany (Local Unknown)',
            '22' => 'West-Germany (Local Unknown)',
            '23' => 'West-Germany (Local Unknown)',
            '24' => 'West-Germany (Local Unknown)',
            '28' => 'West-Germany (Local Unknown)',
            '30' => 'West-Germany (Local Unknown)',
            '31' => 'West-Germany (Local Unknown)',
            '32' => 'West-Germany (Local Unknown)',
            '36' => 'West-Germany (Local Unknown)',
            '37' => 'West-Germany (Local Unknown)',
            '38' => 'West-Germany (Local Unknown)',
            '41' => 'West-Germany (Local Unknown)',
            '45' => 'West-Germany (Local Unknown)',
            '46' => 'West-Germany (Local Unknown)',
            '49' => 'West-Germany,Knöbelkg,Wiedenbrück,Westfalen',
            '54' => 'West-Germany (Local Unknown)',
            '59' => 'West-Germany (Local Unknown)',
            '63' => 'West-Germany (Local Unknown)',
            '64' => 'West-Germany (Local Unknown)',
            '65' => 'West-Germany (Local Unknown)',
            '66' => 'West-Germany (Local Unknown)',
            '70' => 'West-Germany,Essen(?)',
            '71' => 'West-Germany (Local Unknown)',
            '73' => 'West-Germany (Local Unknown)',
            '81' => 'West-Germany (Local Unknown)',
            '82' => 'West-Germany (Local Unknown)',
            '83' => 'West-Germany (Local Unknown)',
            '105' => 'West-Germany,Hannover(?)',
            '121' => 'West-Germany (Local Unknown)',
            '122' => 'West-Germany (Local Unknown)',
            '126' => 'West-Germany (Local Unknown)',
            '127' => 'West-Germany (Local Unknown)',
            '128' => 'West-Germany (Local Unknown)',
            '133' => 'West-Germany,Duisburg(?)',
            '134' => 'West-Germany (Local Unknown)',
            '135' => 'West-Germany (Local Unknown)',
            '142' => 'West-Germany (Local Unknown)',
            '143' => 'West-Germany (Local Unknown)',
            '146' => 'West-Germany (Local Unknown)',
            '888' => 'West-Germany (Local Unknown)',
            '903' => 'West-Germany,DeutscheBundespost(GermanMail)(?)',
            '904' => 'West-Germany,DeutscheBundesbahn(GermanRailroad)(?)',
            '906' => 'West-Germany,Bundeswehr(GermanyArmy)(?)',
            '908' => 'West-Germany (Local Unknown)',
            '910' => 'West-Germany (Local Unknown)',
            '911' => 'West-Germany (Local Unknown)',
            '916' => 'West-Germany,DeutscheBundespost(GermanMail)(?)',
            '928' => 'West-Germany,Karmanncamperfactory(?)',
            'BE' => 'Belgium',
            'DA' => 'Denmark(Danmark)',
            'EN' => 'England',
            'EP' => '???',
            'FJ' => 'Finland',
            'FR' => 'France',
            'HO' => 'TheNetherlands(Holland)',
            'JB' => 'Italy,port:?',
            'JC' => 'Italy,port:?(northwestItaly)',
            'JY' => 'Italy(?)',
            'KA' => 'Canada(Kanada),port:???',
            'KH' => 'Canada(Kanada),port:Halifax(?)',
            'KK' => 'Canada(Kanada),port:Montreal',
            'KN' => 'Canada(Kanada),port:???',
            'KV' => 'Canada(Kanada),port:Vancouver(?)',
            'MY' => 'Malaysia',
            'OR' => 'Austria(Österreich)',
            'SD' => 'Sweden-South',
            'SH' => 'Switserland(Schweiz)',
            'SN' => 'Sweden-North',
            'SV' => 'Sweden-West',
            'SZ' => 'Switserland(Schweiz)',
            'TE' => 'EuropeanDeliveryProgram*',
            'UA' => 'USA,port:???California',
            'UB' => 'USA,port:???Georgia',
            'UC' => 'USA,port:???Wisconsin',
            'UD' => 'USA,port:Philadelphia,PA',
            'UF' => 'USA,port:SanDiego,CA(?)',
            'UH' => 'USA,port:Miami,FL(?)',
            'UJ' => 'USA,port:Jacksonville(?)',
            'UK' => 'USA,port:???Pennsylvania',
            'UL' => 'USA,port:???California',
            'UP' => 'USA,port:???',
            'UR' => 'USA,port:???',
            'US' => 'USA,port:Seattle,WA',
            'UT' => 'PickedupbyfirstowneratthefactoryinGermany,meantforUS-market',
            'UY' => 'USA,port:NewHampshire(?)',
            'UW' => 'USA,port:???',
        ];

        $insert_data = array_map(function ($key, $value) {
            return [
                'code' => $key,
                'export' => $value,
            ];
        }, array_keys($data), $data);

        DB::table('export_destinations')->insert($insert_data);

    }
}
