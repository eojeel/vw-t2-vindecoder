<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDO;

class ImportSqliteData extends Command
{
    protected $signature = 'vin:import-sqlite {path : Path to the SQLite database file}';

    protected $description = 'Copy the VIN decoder data tables from a SQLite file into the default database';

    /** @var list<string> */
    private const TABLES = [
        'colors',
        'mcodes',
        'paint_codes',
        'interior_codes',
        'export_destinations',
        'vins',
        'model_engine_gearboxes',
        'engine_codes',
        'gearbox_codes',
    ];

    public function handle(): int
    {
        $path = $this->argument('path');

        if (! is_file($path)) {
            $this->error("SQLite file not found: {$path}");

            return self::FAILURE;
        }

        $populated = collect(self::TABLES)->filter(fn ($table) => DB::table($table)->exists());

        if ($populated->isNotEmpty()) {
            $this->error('Target tables already contain data: '.$populated->implode(', ').'. Run migrate:fresh first.');

            return self::FAILURE;
        }

        $source = new PDO('sqlite:'.$path, options: [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        DB::transaction(function () use ($source) {
            foreach (self::TABLES as $table) {
                $columns = Schema::getColumnListing($table);

                $rows = $source->query("select * from \"{$table}\"")->fetchAll(PDO::FETCH_ASSOC);

                foreach (array_chunk($rows, 200) as $chunk) {
                    DB::table($table)->insert(
                        array_map(fn ($row) => array_intersect_key($row, array_flip($columns)), $chunk)
                    );
                }

                $this->line(sprintf('%-24s %d rows', $table, count($rows)));
            }
        });

        $this->info('Import complete.');

        return self::SUCCESS;
    }
}
