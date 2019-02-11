<?php

use Illuminate\Database\Seeder;

class ProjectProposalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_proposals')->delete();
        
        \DB::table('project_proposals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_request_id' => 1,
                'auth_user_id' => 5,
                'title' => 'লালমাই-ময়নামতি প্রকল্প',
                'created_at' => '2019-02-07 21:43:14',
                'updated_at' => '2019-02-07 21:49:30',
                'status' => 'APPROVED',
            ),
            1 => 
            array (
                'id' => 2,
                'project_request_id' => 1,
                'auth_user_id' => 5,
                'title' => 'বার্ডের ভৌত উন্নয়ন প্রকল্প',
                'created_at' => '2019-02-07 21:44:58',
                'updated_at' => '2019-02-07 21:47:33',
                'status' => 'REJECTED',
            ),
            2 => 
            array (
                'id' => 3,
                'project_request_id' => 1,
                'auth_user_id' => 5,
                'title' => 'মশিআপুউ প্রকল্প',
                'created_at' => '2019-02-07 21:48:19',
                'updated_at' => '2019-02-07 21:49:34',
                'status' => 'REJECTED',
            ),
        ));
        
        
    }
}