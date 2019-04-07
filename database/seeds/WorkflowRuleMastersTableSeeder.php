<?php

use Illuminate\Database\Seeder;

class WorkflowRuleMastersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workflow_rule_masters')->delete();
        
        \DB::table('workflow_rule_masters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'feature_id' => 1,
                'department_id' => 1,
                'name' => 'Research Proposal brief Workflow',
                'rule' => 'infinite user',
                'get_back_status' => 'previous',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'feature_id' => 2,
                'department_id' => 2,
                'name' => 'Project Proposal Workflow',
                'rule' => 'Initiator to Faculty Director to Project Director',
                'get_back_status' => 'previous',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'feature_id' => 3,
                'department_id' => 1,
                'name' => 'Research Workflow',
                'rule' => 'Initiator to Research Director (Send Back/Approved)',
                'get_back_status' => 'previous',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}