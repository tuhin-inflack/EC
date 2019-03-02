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
        
        \DB::table('workflow_rule_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'rule_master_id' => 1,
                'designation_id' => 2,
                'notification_order' => 1,
                'number_of_responder' => 1,
                'is_group_notification' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'rule_master_id' => 1,
                'designation_id' => 3,
                'notification_order' => 2,
                'number_of_responder' => 1,
                'is_group_notification' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'rule_master_id' => 2,
                'designation_id' => 2,
                'notification_order' => 1,
                'number_of_responder' => 1,
                'is_group_notification' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'rule_master_id' => 2,
                'designation_id' => 4,
                'notification_order' => 2,
                'number_of_responder' => 1,
                'is_group_notification' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'rule_master_id' => 3,
                'designation_id' => 3,
                'notification_order' => 1,
                'number_of_responder' => 1,
                'is_group_notification' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}