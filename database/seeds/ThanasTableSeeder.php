<?php

use Illuminate\Database\Seeder;

class ThanasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('thanas')->delete();
        
        \DB::table('thanas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'district_id' => 1,
                'name' => 'Raozan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}