<?php

use Illuminate\Database\Seeder;

class UnionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unions')->delete();
        
        \DB::table('unions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'thana_id' => 1,
                'name' => 'দুর্গাপুর',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}