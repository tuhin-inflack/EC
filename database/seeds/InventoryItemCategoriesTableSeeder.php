<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_item_categories')->truncate();

        DB::table('inventory_item_categories')->insert([
            [
                'name' => 'Chair',
                'short_code' => 'chair',
                'type' => 'fixed asset',
                'unit' => 'piece',
            ],
            [
                'name' => 'Table',
                'short_code' => 'table',
                'type' => 'fixed asset',
                'unit' => 'piece',
            ],
            [
                'name' => 'Paper',
                'short_code' => 'paper',
                'type' => 'stationery',
                'unit' => 'ream',
            ]
        ]);
    }
}
