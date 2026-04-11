<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class TransferDataToMysql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:transfer-data-to-mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */



public function handle()
{
    $tables = [
    'users',
    'pens',
    'records',
    'sales',
    'expenses',
    'settings'

        // add ALL your tables here
    ];

    foreach ($tables as $table) {

        $this->info("Migrating: $table");

        DB::connection('sqlite')
            ->table($table)
            ->orderBy('id')
            ->chunk(100, function ($rows) use ($table) {

                foreach ($rows as $row) {
                    DB::table($table)->insert((array) $row);
                }

            });
    }

    
    $this->info("✅ Data migration completed!");
}
}
