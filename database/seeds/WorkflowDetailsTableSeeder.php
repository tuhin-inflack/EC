<?php

use Illuminate\Database\Seeder;

class WorkflowDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workflow_details')->delete();
        
        \DB::table('workflow_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'workflow_master_id' => 1,
                'rule_detail_id' => 3,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => 'Approved by FD',
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 21:43:14',
                'updated_at' => '2019-02-07 21:43:54',
            ),
            1 => 
            array (
                'id' => 2,
                'workflow_master_id' => 1,
                'rule_detail_id' => 4,
                'designation_id' => 4,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 6,
                'responder_id' => NULL,
                'responder_remarks' => 'Approved by FD',
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 21:43:14',
                'updated_at' => '2019-02-07 21:44:16',
            ),
            2 => 
            array (
                'id' => 3,
                'workflow_master_id' => 2,
                'rule_detail_id' => 3,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => 'Forward to PD',
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 21:44:58',
                'updated_at' => '2019-02-07 21:47:14',
            ),
            3 => 
            array (
                'id' => 4,
                'workflow_master_id' => 2,
                'rule_detail_id' => 4,
                'designation_id' => 4,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 6,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 21:44:58',
                'updated_at' => '2019-02-07 21:47:34',
            ),
            4 => 
            array (
                'id' => 5,
                'workflow_master_id' => 3,
                'rule_detail_id' => 3,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 21:48:19',
                'updated_at' => '2019-02-07 21:48:37',
            ),
            5 => 
            array (
                'id' => 6,
                'workflow_master_id' => 3,
                'rule_detail_id' => 4,
                'designation_id' => 4,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 6,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 21:48:19',
                'updated_at' => '2019-02-07 21:49:24',
            ),
            6 => 
            array (
                'id' => 7,
                'workflow_master_id' => 4,
                'rule_detail_id' => 1,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 22:05:02',
                'updated_at' => '2019-02-07 22:09:28',
            ),
            7 => 
            array (
                'id' => 8,
                'workflow_master_id' => 4,
                'rule_detail_id' => 2,
                'designation_id' => 3,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 6,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:05:02',
                'updated_at' => '2019-02-07 22:09:47',
            ),
            8 => 
            array (
                'id' => 9,
                'workflow_master_id' => 5,
                'rule_detail_id' => 1,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => 'approved by FD',
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 22:06:17',
                'updated_at' => '2019-02-07 22:06:46',
            ),
            9 => 
            array (
                'id' => 10,
                'workflow_master_id' => 5,
                'rule_detail_id' => 2,
                'designation_id' => 3,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 6,
                'responder_id' => NULL,
                'responder_remarks' => 'approve for APC',
                'status' => 'APPROVED',
                'created_at' => '2019-02-07 22:06:17',
                'updated_at' => '2019-02-07 22:07:14',
            ),
            10 => 
            array (
                'id' => 11,
                'workflow_master_id' => 6,
                'rule_detail_id' => 1,
                'designation_id' => 2,
                'notification_order' => 1,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:08:36',
                'updated_at' => '2019-02-07 22:08:55',
            ),
            11 => 
            array (
                'id' => 12,
                'workflow_master_id' => 6,
                'rule_detail_id' => 2,
                'designation_id' => 3,
                'notification_order' => 2,
                'is_group_notification' => 1,
                'creator_id' => 5,
                'responder_id' => NULL,
                'responder_remarks' => NULL,
                'status' => 'CLOSED',
                'created_at' => '2019-02-07 22:08:36',
                'updated_at' => '2019-02-07 22:08:55',
            ),
        ));
        
        
    }
}