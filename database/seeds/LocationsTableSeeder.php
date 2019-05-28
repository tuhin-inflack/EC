<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->truncate();

        DB::table('locations')->insert([
            [
                'name' => 'main store',
                'department_id' => null,
                'type' => "store",
                'description' => "Main store for BARD.",
                'is_default' => true,
            ],
            [
                'name' => 'scrap location',
                'department_id' => null,
                'type' => "general",
                'description' => "Scrap location",
                'is_default' => true,
            ],
            [
                'name' => 'abandon location',
                'department_id' => null,
                'type' => "general",
                'description' => "Abandon location",
                'is_default' => true,
            ],
        ]);
    }
}
