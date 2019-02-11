<?php

use Illuminate\Database\Seeder;

class AccountHeadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('account_heads')->delete();
        
        \DB::table('account_heads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'name' => 'Assets',
                'code' => '',
                'head_type' => 1,
                'description' => 'Main Asset Head',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'name' => 'Liability',
                'code' => '',
                'head_type' => 2,
                'description' => 'Main Liability Head',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'name' => 'Income',
                'code' => '',
                'head_type' => 3,
                'description' => 'Main Income Head',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 0,
                'name' => 'Expense',
                'code' => '',
                'head_type' => 4,
                'description' => 'Main Expense Head',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
        ));
        
        
    }
}