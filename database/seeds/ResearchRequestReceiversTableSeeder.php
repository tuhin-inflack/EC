<?php

use Illuminate\Database\Seeder;

class ResearchRequestReceiversTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research_request_receivers')->delete();
        
        \DB::table('research_request_receivers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'research_request_id' => 1,
                'to' => 1,
                'created_at' => '2019-02-07 22:01:02',
                'updated_at' => '2019-02-07 22:01:02',
            ),
            1 => 
            array (
                'id' => 2,
                'research_request_id' => 2,
                'to' => 1,
                'created_at' => '2019-02-07 22:04:35',
                'updated_at' => '2019-02-07 22:04:35',
            ),
        ));
        
        
    }
}