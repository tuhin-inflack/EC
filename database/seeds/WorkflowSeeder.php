<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->truncate();
        DB::table('departments')->truncate();
        DB::table('designations')->truncate();
        DB::table('employees')->truncate();
        DB::table('features')->truncate();
        DB::table('workflow_rule_masters')->truncate();
        DB::table('workflow_rule_details')->truncate();
//        department seeding
        $departments = [
            1 => ['name' => 'Research Management System', 'department_code' => 'RMS'],
            2 => ['name' => 'Project Management System', 'department_code' => 'PMS']
        ];
        foreach ($departments as $department) {
            DB::table('departments')->insert($department);
        }
//designation seeding
        /*
        $designations = [
            ['name' => 'Faculty Member', 'short_name' => 'FM', 'department_id' => 1],
            ['name' => 'Faculty Director', 'short_name' => 'FD', 'department_id' => 1],
            ['name' => 'Research Director', 'short_name' => 'RD', 'department_id' => 1],
            ['name' => 'Project Director', 'short_name' => 'RD', 'department_id' => 2],
        ];
        foreach ($designations as $designation) {
            DB::table('designations')->insert($designation);
        } */
//employee & user seeding
        $employees = [
            1 => ['employee_id' => 'FM10', 'first_name' => 'Faculty', 'last_name' => 'Member', 'email' => 'f@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 1, 'mobile_one' => '01711111111'],
            2 => ['employee_id' => 'FD11', 'first_name' => 'Faculty', 'last_name' => 'Director', 'email' => 'fd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 2, 'mobile_one' => '01711111112'],
            3 => ['employee_id' => 'RD12', 'first_name' => 'Research', 'last_name' => 'Director', 'email' => 'rd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 3, 'mobile_one' => '01711111113'],
            4 => ['employee_id' => 'PD1', 'first_name' => 'Project', 'last_name' => 'Director', 'email' => 'pd1@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 4, 'mobile_one' => '01711111113'],
            5 => ['employee_id' => 'JDP', 'first_name' => 'Joint Director', 'last_name' => 'Project', 'email' => 'jdp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 14, 'mobile_one' => '01711111113'],
            6 => ['employee_id' => 'DG', 'first_name' => 'Director', 'last_name' => 'General', 'email' => 'dg@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 17, 'mobile_one' => '01711111113'],
            7 => ['employee_id' => 'JDR', 'first_name' => 'Joint Director', 'last_name' => 'Research', 'email' => 'jdr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 19, 'mobile_one' => '01711111113'],
            8 => ['employee_id' => 'ADP', 'first_name' => 'Asst. Director', 'last_name' => 'Project', 'email' => 'adp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 13, 'mobile_one' => '01711111113'],
            9 => ['employee_id' => 'DDP', 'first_name' => 'Deputy Director', 'last_name' => 'Project', 'email' => 'ddp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 15, 'mobile_one' => '01711111113'],
            10 => ['employee_id' => 'ADR', 'first_name' => 'Asst. Director', 'last_name' => 'Research', 'email' => 'adr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 18, 'mobile_one' => '01711111113'],
            11 => ['employee_id' => 'DDR', 'first_name' => 'Deputy Director', 'last_name' => 'Research', 'email' => 'ddr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 20, 'mobile_one' => '01711111113'],
        ];

        foreach ($employees as $key => $employee) {
            DB::table('employees')->insert($employee);
            $user = [];
            $user['name'] = $employee['first_name'] . " " . $employee['last_name'];
            $user['email'] = $employee['email'];
//            123123
            $user['password'] = '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS';
            $user['username'] = $employee['employee_id'];
            $user['user_type'] = 'Employee';
            $user['mobile'] = $employee['mobile_one'];
            $user['reference_table_id'] = $key;
            \App\Entities\User::create($user);

        }

//        feature seeding
        $features = [
            ['name' => 'Research Proposal'],
            ['name' => 'Project Proposal'],
//            ['name' => \Illuminate\Support\Facades\Config::get('constants.project_proposal_feature_name')],
        ];
        foreach ($features as $feature) {
            DB::table('features')->insert($feature);
        }

//        workflow rule master seeding
        $ruleMasterdata = [
            ['feature_id' => 1, 'department_id' => 1, 'name' => 'Research Proposal Workflow', 'rule' => 'Initiator to Faculty Director to Research Director', 'get_back_status' => 'previous',],
            ['feature_id' => 2, 'department_id' => 2, 'name' => 'Project Proposal Workflow', 'rule' => 'Initiator to Faculty Director to Project Director', 'get_back_status' => 'previous',]
        ];

        foreach ($ruleMasterdata as $ruleMasterItem) {
            DB::table('workflow_rule_masters')->insert($ruleMasterItem);
        }

//        workflow rule details
        $ruleDetails = [
            ['rule_master_id' => 1, 'designation_id' => 3, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'forward'],
            ['rule_master_id' => 1, 'designation_id' => 19, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'none', 'flow_type' => 'review'],
            ['rule_master_id' => 1, 'designation_id' => 3, 'notification_order' => 3, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval'],
            ['rule_master_id' => 1, 'designation_id' => 17, 'notification_order' => 4, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'previous', 'flow_type' => 'approval'],

            ['rule_master_id' => 2, 'designation_id' => 4, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'forward'],
            ['rule_master_id' => 2, 'designation_id' => 14, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'none', 'flow_type' => 'review'],
            ['rule_master_id' => 2, 'designation_id' => 4, 'notification_order' => 3, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'initiator', 'flow_type' => 'approval'],
            ['rule_master_id' => 2, 'designation_id' => 17, 'notification_order' => 4, 'number_of_responder' => 1, 'is_group_notification' => 1, 'get_back_status' => 'previous', 'flow_type' => 'approval'],
        ];

        foreach ($ruleDetails as $ruleDetail) {
            DB::table('workflow_rule_details')->insert($ruleDetail);
        }
    }
}
