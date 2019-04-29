<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('divisions')->delete();
        
        \DB::table('divisions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'চট্টগ্রাম',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}