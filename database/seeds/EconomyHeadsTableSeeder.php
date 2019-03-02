<?php

use Illuminate\Database\Seeder;

class EconomyHeadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('economy_heads')->delete();
        
        \DB::table('economy_heads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'code' => '31113',
                'english_name' => 'Allowances',
                'bangla_name' => 'ভাতাদি',
                'description' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'code' => '71133',
                'english_name' => 'Computer software and databases',
                'bangla_name' => 'কম্পিউটার সফটওয়্যার ও ড্যাটাবেজ',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}