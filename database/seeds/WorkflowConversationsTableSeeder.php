<?php

use Illuminate\Database\Seeder;

class WorkflowConversationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workflow_conversations')->delete();
        
        \DB::table('workflow_conversations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'workflow_master_id' => 1,
                'workflow_details_id' => 1,
                'feature_id' => 2,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:43:14',
                'updated_at' => '2019-02-07 21:43:54',
            ),
            1 => 
            array (
                'id' => 2,
                'workflow_master_id' => 1,
                'workflow_details_id' => 2,
                'feature_id' => 2,
                'message' => 'Approved by FD',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:43:54',
                'updated_at' => '2019-02-07 21:44:16',
            ),
            2 => 
            array (
                'id' => 3,
                'workflow_master_id' => 2,
                'workflow_details_id' => 3,
                'feature_id' => 2,
                'message' => 'Review',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:44:58',
                'updated_at' => '2019-02-07 21:45:25',
            ),
            3 => 
            array (
                'id' => 4,
                'workflow_master_id' => 2,
                'workflow_details_id' => 3,
                'feature_id' => 2,
                'message' => 'Please edit',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:45:25',
                'updated_at' => '2019-02-07 21:45:48',
            ),
            4 => 
            array (
                'id' => 5,
                'workflow_master_id' => 2,
                'workflow_details_id' => 3,
                'feature_id' => 2,
                'message' => 'now please check this',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:45:48',
                'updated_at' => '2019-02-07 21:46:11',
            ),
            5 => 
            array (
                'id' => 6,
                'workflow_master_id' => 2,
                'workflow_details_id' => 3,
                'feature_id' => 2,
                'message' => 'please revise this',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:46:11',
                'updated_at' => '2019-02-07 21:46:44',
            ),
            6 => 
            array (
                'id' => 7,
                'workflow_master_id' => 2,
                'workflow_details_id' => 3,
                'feature_id' => 2,
                'message' => 'please now check',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:46:44',
                'updated_at' => '2019-02-07 21:47:14',
            ),
            7 => 
            array (
                'id' => 8,
                'workflow_master_id' => 2,
                'workflow_details_id' => 4,
                'feature_id' => 2,
                'message' => 'Forward to PD',
                'status' => 'ACTIVE',
                'created_at' => '2019-02-07 21:47:14',
                'updated_at' => '2019-02-07 21:47:14',
            ),
            8 => 
            array (
                'id' => 9,
                'workflow_master_id' => 3,
                'workflow_details_id' => 5,
                'feature_id' => 2,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:48:19',
                'updated_at' => '2019-02-07 21:48:37',
            ),
            9 => 
            array (
                'id' => 10,
                'workflow_master_id' => 3,
                'workflow_details_id' => 6,
                'feature_id' => 2,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:48:37',
                'updated_at' => '2019-02-07 21:49:24',
            ),
            10 => 
            array (
                'id' => 11,
                'workflow_master_id' => 4,
                'workflow_details_id' => 7,
                'feature_id' => 1,
                'message' => 'message',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:05:02',
                'updated_at' => '2019-02-07 22:05:41',
            ),
            11 => 
            array (
                'id' => 12,
                'workflow_master_id' => 4,
                'workflow_details_id' => 7,
                'feature_id' => 1,
                'message' => 'Please correct this',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:05:41',
                'updated_at' => '2019-02-07 22:07:41',
            ),
            12 => 
            array (
                'id' => 13,
                'workflow_master_id' => 5,
                'workflow_details_id' => 9,
                'feature_id' => 1,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:06:17',
                'updated_at' => '2019-02-07 22:06:46',
            ),
            13 => 
            array (
                'id' => 14,
                'workflow_master_id' => 5,
                'workflow_details_id' => 10,
                'feature_id' => 1,
                'message' => 'approved by FD',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:06:46',
                'updated_at' => '2019-02-07 22:07:14',
            ),
            14 => 
            array (
                'id' => 15,
                'workflow_master_id' => 4,
                'workflow_details_id' => 7,
                'feature_id' => 1,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:07:41',
                'updated_at' => '2019-02-07 22:08:03',
            ),
            15 => 
            array (
                'id' => 16,
                'workflow_master_id' => 4,
                'workflow_details_id' => 7,
                'feature_id' => 1,
                'message' => 'review this',
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:08:03',
                'updated_at' => '2019-02-07 22:09:19',
            ),
            16 => 
            array (
                'id' => 17,
                'workflow_master_id' => 6,
                'workflow_details_id' => 11,
                'feature_id' => 1,
                'message' => NULL,
                'status' => 'ACTIVE',
                'created_at' => '2019-02-07 22:08:36',
                'updated_at' => '2019-02-07 22:08:36',
            ),
            17 => 
            array (
                'id' => 18,
                'workflow_master_id' => 4,
                'workflow_details_id' => 7,
                'feature_id' => 1,
                'message' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:09:19',
                'updated_at' => '2019-02-07 22:09:28',
            ),
            18 => 
            array (
                'id' => 19,
                'workflow_master_id' => 4,
                'workflow_details_id' => 8,
                'feature_id' => 1,
                'message' => NULL,
                'status' => 'ACTIVE',
                'created_at' => '2019-02-07 22:09:28',
                'updated_at' => '2019-02-07 22:09:28',
            ),
        ));
        
        
    }
}