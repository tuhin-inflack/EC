<?php

use Illuminate\Database\Seeder;

class ResearchTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research')->delete();
        
        \DB::table('research')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Research 1',
                'submitted_by' => 5,
                'status' => 'PENDING',
                'created_at' => '2019-04-10 11:57:17',
                'updated_at' => '2019-04-10 11:57:17',
            ),
        ));
        
        
    }
}