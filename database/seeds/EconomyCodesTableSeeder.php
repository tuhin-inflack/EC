<?php

use Illuminate\Database\Seeder;

class EconomyCodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('economy_codes')->delete();
        
        \DB::table('economy_codes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '3111301',
                'english_name' => 'Charge allowance',
                'bangla_name' => 'দায়িত্ব ভাতা',
                'description' => NULL,
                'economy_head_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '3111303',
                'english_name' => 'Daily allowance',
                'bangla_name' => 'দৈনিক ভাতা',
                'description' => NULL,
                'economy_head_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '3111306',
                'english_name' => 'Education allowance',
                'bangla_name' => 'শিক্ষা ভাতা',
                'description' => NULL,
                'economy_head_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '7113301',
                'english_name' => 'Computer software',
                'bangla_name' => 'কম্পিউটার সফটওয়্যার',
                'description' => NULL,
                'economy_head_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '7113302',
                'english_name' => 'Databases',
                'bangla_name' => 'ড্যাটাবেজ',
                'description' => NULL,
                'economy_head_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}