<?php

use Illuminate\Database\Seeder;

class WorkflowRuleDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workflow_rule_details')->delete();
        
        \DB::table('workflow_rule_details')->insert([
            ['rule_master_id' => 1, 'designation_id' => 3, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],
            ['rule_master_id' => 1, 'designation_id' => 19, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'none', 'flow_type' => 'review', 'is_shareable' =>'1', 'share_rule_id'=>1, 'proceed_btn_label' => 'review complete'],
            ['rule_master_id' => 1, 'designation_id' => 3, 'notification_order' => 3, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],
            ['rule_master_id' => 1, 'designation_id' => 17, 'notification_order' => 4, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'previous', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],

            ['rule_master_id' => 2, 'designation_id' => 4, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],
            ['rule_master_id' => 2, 'designation_id' => 14, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'none', 'flow_type' => 'review', 'is_shareable' =>'1', 'share_rule_id'=>2, 'proceed_btn_label' => 'review complete'],
            ['rule_master_id' => 2, 'designation_id' => 4, 'notification_order' => 3, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],
            ['rule_master_id' => 2, 'designation_id' => 17, 'notification_order' => 4, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'previous', 'flow_type' => 'approval', 'is_shareable' =>'0', 'share_rule_id'=>NULL],
        ]);
        
        
    }
}