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
        DB::table('departments')->truncate();
        DB::table('designations')->truncate();
        DB::table('employees')->truncate();
        DB::table('features')->truncate();
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
        ];
        foreach ($designations as $designation) {
            DB::table('designations')->insert($designation);
        }
//employee & user seeding
        $employees = [
            ['employee_id' => 100001, 'first_name' => 'Faculty', 'last_name' => 'Member', 'email' => 'f@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 1, 'mobile_one' => '01711111111'],
            ['employee_id' => 100002, 'first_name' => 'Faculty', 'last_name' => 'Director', 'email' => 'fd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 1, 'mobile_one' => '01711111112'],
            ['employee_id' => 100003, 'first_name' => 'Research', 'last_name' => 'Director', 'email' => 'rd@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_code' => 1, 'mobile_one' => '01711111113'],
        ];

//        foreach ($employees as $employee) {
//            DB::table('employees')->insert($employee);
//            $user = [];
//            $user['name'] = $employee['first_name'] . " " . $employee['last_name'];
//            $user['email'] = $employee['email'];
////            123123
//            $user['password'] = '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS';
//            $user['username'] = $employee['mobile_one'];
//            $user['user_type'] = 'Employee';
//            $user['mobile'] = $employee['mobile_one'];
//            \App\Entities\User::create($user);
//
//        }

//        feature seeding
        $features = [
            ['name' => \Illuminate\Support\Facades\Config::get('constants.research_proposal_feature_name')],
            ['name' => \Illuminate\Support\Facades\Config::get('constants.project_proposal_feature_name')],
        ];
        foreach ($features as $feature) {
            DB::table('features')->insert($feature);
        }

//        workflow rule master seeding


    }
}
