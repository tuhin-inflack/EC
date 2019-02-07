<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InverseSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:inverse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Seeder of existing data from database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('iseed', ['tables' => $this->getTableNames()]);
    }

    private function getTableNames()
    {
        $tableNameContainer = DB::select('show tables');
        $tableNamesArray = [];

        foreach ($tableNameContainer as $index => $tableNames) {
            foreach ($tableNames as $name) {
                array_push($tableNamesArray, $name);
            }
        }

        return implode(',', $tableNamesArray);
    }
}
