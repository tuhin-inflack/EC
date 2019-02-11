<?php

use Illuminate\Database\Seeder;

class ResearchProposalSubmissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research_proposal_submissions')->delete();
        
        \DB::table('research_proposal_submissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'research_request_id' => 2,
                'auth_user_id' => 5,
                'title' => 'River Bank Erosion and its Effects on Rural Society in Bangladesh',
                'created_at' => '2019-02-07 22:05:02',
                'updated_at' => '2019-02-07 22:09:47',
                'status' => 'REJECTED',
            ),
            1 => 
            array (
                'id' => 2,
                'research_request_id' => 2,
                'auth_user_id' => 5,
                'title' => 'Micro Credit Operation by the Public Sector in BD: Origin, Performance and Replication',
                'created_at' => '2019-02-07 22:06:17',
                'updated_at' => '2019-02-07 22:07:22',
                'status' => 'APPROVED',
            ),
            2 => 
            array (
                'id' => 3,
                'research_request_id' => 2,
                'auth_user_id' => 5,
                'title' => 'Value Chain Analysis of Poultry and Pineapple: Selected Cases of Bangladesh',
                'created_at' => '2019-02-07 22:08:36',
                'updated_at' => '2019-02-07 22:08:55',
                'status' => 'REJECTED',
            ),
        ));
        
        
    }
}