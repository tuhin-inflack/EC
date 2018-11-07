<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\AccountHead;

class DefaultAccountHeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heads = [
            [
                'parent_id' => 0,
                'name' => 'Assets',
                'code' => '',
                'head_type' => 1, // Assets Type = 1
                'description' => 'Main Asset Head'
            ],
            [
                'parent_id' => 0,
                'name' => 'Liability',
                'code' => '',
                'head_type' => 2, // Liability = 2
                'description' => 'Main Liability Head'
            ],
            [
                'parent_id' => 0,
                'name' => 'Income',
                'code' => '',
                'head_type' => 3, // Income = 3
                'description' => 'Main Income Head'
            ],
            [
                'parent_id' => 0,
                'name' => 'Expense',
                'code' => '',
                'head_type' => 4, // Expense = 4
                'description' => 'Main Expense Head'
            ]
        ];

        foreach ($heads as $key => $value) {
            AccountHead::create($value);
        }
    }
}
