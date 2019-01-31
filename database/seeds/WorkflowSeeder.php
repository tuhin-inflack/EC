<?php

use Illuminate\Database\Seeder;

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
        $designations = [
            ['name' => 'Faculty Member', 'short_name' => 'FM', 'department_id' => 1],
            ['name' => 'Faculty Director', 'short_name' => 'FD', 'department_id' => 1],
            ['name' => 'Research Director', 'short_name' => 'RD', 'department_id' => 1],
            ['name' => 'Project Director', 'short_name' => 'RD', 'department_id' => 2],
        ];
        foreach ($designations as $designation) {
            DB::table('designations')->insert($designation);
        }
//employee & user seeding
        $employees = [
            1 => ['employee_id' => 'FM10', 'first_name' => 'Faculty', 'last_name' => 'Member', 'email' => 'f@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 1, 'mobile_one' => '01711111111'],
            2 => ['employee_id' => 'FD11', 'first_name' => 'Faculty', 'last_name' => 'Director', 'email' => 'fd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 2, 'mobile_one' => '01711111112'],
            3 => ['employee_id' => 'RD12', 'first_name' => 'Research', 'last_name' => 'Director', 'email' => 'rd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 3, 'mobile_one' => '01711111113'],
            3 => ['employee_id' => 'PD1', 'first_name' => 'Project', 'last_name' => 'Director', 'email' => 'pd1@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_code' => 4, 'mobile_one' => '01711111113'],
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
            ['name' => \Illuminate\Support\Facades\Config::get('constants.research_proposal_feature_name')],
            ['name' => \Illuminate\Support\Facades\Config::get('constants.project_proposal_feature_name')],
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
            ['rule_master_id' => 1, 'designation_id' => 2, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1],
            ['rule_master_id' => 1, 'designation_id' => 3, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1],
            ['rule_master_id' => 2, 'designation_id' => 2, 'notification_order' => 1, 'number_of_responder' => 1, 'is_group_notification' => 1],
            ['rule_master_id' => 2, 'designation_id' => 3, 'notification_order' => 2, 'number_of_responder' => 1, 'is_group_notification' => 1],
        ];

        foreach ($ruleDetails as $ruleDetail) {
            DB::table('workflow_rule_details')->insert($ruleDetail);
        }

    }
}
