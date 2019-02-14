<?php

use Illuminate\Database\Seeder;

class ResearchRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research_requests')->delete();
        
        \DB::table('research_requests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'River Bank Erosion and its Effects on Rural Society in Bangladesh',
                'end_date' => '2019-03-08 22:01:02',
                'remarks' => NULL,
                'created_at' => '2019-02-07 22:01:02',
                'updated_at' => '2019-02-07 22:01:02',
                'status' => 'pending',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Research Invitation',
                'end_date' => '2019-03-09 22:04:35',
                'remarks' => 'Please check this',
                'created_at' => '2019-02-07 22:04:35',
                'updated_at' => '2019-02-07 22:04:35',
                'status' => 'pending',
            ),
        ));
        
        
    }
}