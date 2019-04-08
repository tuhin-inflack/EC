<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('employees')->delete();

        $employees = array(
            0 =>
                array(
                    'id' => 1,
                    'employee_id' => 'FM10',
                    'first_name' => 'Faculty',
                    'last_name' => 'Member',
                    'photo' => NULL,
                    'email' => 'f@gmail.com',
                    'gender' => 'Male',
                    'department_id' => 1,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => NULL,
                    'tel_home' => NULL,
                    'mobile_one' => '01711111111',
                    'mobile_two' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'id' => 2,
                    'employee_id' => 'FD11',
                    'first_name' => 'Faculty',
                    'last_name' => 'Director',
                    'photo' => NULL,
                    'email' => 'fd@gmail.com',
                    'gender' => 'Male',
                    'department_id' => 1,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => NULL,
                    'tel_home' => NULL,
                    'mobile_one' => '01711111112',
                    'mobile_two' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'id' => 3,
                    'employee_id' => 'RD12',
                    'first_name' => 'Research',
                    'last_name' => 'Director',
                    'photo' => NULL,
                    'email' => 'rd@gmail.com',
                    'gender' => 'Male',
                    'department_id' => 1,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => NULL,
                    'tel_home' => NULL,
                    'mobile_one' => '01711111113',
                    'mobile_two' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            3 =>
                array(
                    'id' => 4,
                    'employee_id' => 'PD1',
                    'first_name' => 'Project',
                    'last_name' => 'Director',
                    'photo' => NULL,
                    'email' => 'pd1@gmail.com',
                    'gender' => 'Male',
                    'department_id' => 2,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => NULL,
                    'tel_home' => NULL,
                    'mobile_one' => '01711111113',
                    'mobile_two' => NULL,
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ),
            4 =>
                array(
                    'id' => 5,
                    'employee_id' => '10001',
                    'first_name' => 'মহিউদ্দিন',
                    'last_name' => 'জাহাঙ্গীর',
                    'photo' => 'default-profile-picture.png',
                    'email' => 'employee1@bard.com',
                    'gender' => 'male',
                    'department_id' => 1,
                    'designation_id' => '2',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => '01254487444',
                    'tel_home' => '01254487444',
                    'mobile_one' => '01254487444',
                    'mobile_two' => '01254487444',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                    'deleted_at' => NULL,
                ),
            5 =>
                array(
                    'id' => 6,
                    'employee_id' => '20001',
                    'first_name' => 'হামিদুর',
                    'last_name' => 'রহমান',
                    'photo' => 'default-profile-picture.png',
                    'email' => 'employee2@bard.com',
                    'gender' => 'male',
                    'department_id' => 2,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => '01254487445',
                    'tel_home' => '01254487445',
                    'mobile_one' => '01254487445',
                    'mobile_two' => '01254487445',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                    'deleted_at' => NULL,
                ),
            6 =>
                array(
                    'id' => 7,
                    'employee_id' => '30001',
                    'first_name' => 'মতিউর',
                    'last_name' => 'আমিন',
                    'photo' => 'default-profile-picture.png',
                    'email' => 'employee3@bard.com',
                    'gender' => 'male',
                    'department_id' => 3,
                    'designation_id' => '1',
                    "is_divisional_director" => 0,
                    'status' => 'present',
                    'tel_office' => '01254487446',
                    'tel_home' => '01254487446',
                    'mobile_one' => '01254487446',
                    'mobile_two' => '01254487446',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                    'deleted_at' => NULL,
                ),
        );
        $count = 1;
        foreach ($employees as $employee) {
            DB::table('employees')->insert($employee);
            $user = [];
            $user['name'] = $employee['first_name'] . " " . $employee['last_name'];
            $user['email'] = $employee['email'];
            $user['password'] = '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS';//            123123
            $user['username'] = $employee['employee_id'];
            $user['user_type'] = 'Employee';
            $user['mobile'] = $employee['mobile_one'];
            $user['reference_table_id'] = $count++;
            $user['last_password_change'] = '2019-02-07 21:28:52';
            \App\Entities\User::create($user);

        }

        $employees = array(
//            0 => ['employee_id' => 'JDP', 'first_name' => 'Joint Director', 'last_name' => 'Project', 'email' => 'jdp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 14, 'mobile_one' => '01711111113'],
//            7 => ['employee_id' => 'DG1', 'first_name' => 'Director', 'last_name' => 'General', 'email' => 'dg@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 17, 'mobile_one' => '01711111113'],
//            9 => ['employee_id' => 'ADP', 'first_name' => 'Asst. Director', 'last_name' => 'Project', 'email' => 'adp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 13, 'mobile_one' => '01711111113'],
//            10 => ['employee_id' => 'DDP', 'first_name' => 'Deputy Director', 'last_name' => 'Project', 'email' => 'ddp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 15, 'mobile_one' => '01711111113'],

            7 => ['employee_id' => 'DIRR', 'first_name' => 'Director', 'last_name' => 'Research', 'email' => 'dirr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 22,  "is_divisional_director" => 1, 'mobile_one' => '01711119113'],
            8 => ['employee_id' => 'ADR', 'first_name' => 'Asst. Director', 'last_name' => 'Research', 'email' => 'adr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 18, "is_divisional_director" => 0, 'mobile_one' => '01711161113'],
            9 => ['employee_id' => 'JDR', 'first_name' => 'Joint Director', 'last_name' => 'Research', 'email' => 'jdr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 19, "is_divisional_director" => 0, 'mobile_one' => '01711111213'],
            10 => ['employee_id' => 'DDR', 'first_name' => 'Deputy Director', 'last_name' => 'Research', 'email' => 'ddr@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 20, "is_divisional_director" => 0, 'mobile_one' => '01721111113'],
            11 => ['employee_id' => 'directorgeneral', 'first_name' => 'Director', 'last_name' => 'General', 'email' => 'dg@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 17, "is_divisional_director" => 0, 'mobile_one' => '01711131113'],
            12 => ['employee_id' => 'ADGR', 'first_name' => 'Asst. Director', 'last_name' => 'General', 'email' => 'adg@gmail.com', 'gender' => 'Male', 'department_id' => 1, 'designation_id' => 16, "is_divisional_director" => 0, 'mobile_one' => '01711211113'],

//            seeding hrm data
            13 => ['employee_id' => 'HRM1', 'first_name' => 'Human Resource', 'last_name' => 'Faculty', 'email' => 'hrfm@gmail.com', 'gender' => 'Male', 'department_id' => 5, 'designation_id' => 1, "is_divisional_director" => 0, 'mobile_one' => '01711111114'],
            14 => ['employee_id' => 'DIRHR', 'first_name' => 'Director', 'last_name' => 'Human Resource', 'email' => 'dirhr@gmail.com', 'gender' => 'Male', 'department_id' => 5, 'designation_id' => 21, "is_divisional_director" => 1, 'mobile_one' => '01723111114'],

            15 => ['employee_id' => 'DIRP', 'first_name' => 'Director', 'last_name' => 'Project', 'email' => 'dirp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 23,  "is_divisional_director" => 1, 'mobile_one' => '01711119113'],
            16 => ['employee_id' => 'ADP', 'first_name' => 'Asst. Director', 'last_name' => 'Project', 'email' => 'adp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 13, "is_divisional_director" => 0, 'mobile_one' => '01711161113'],
            16 => ['employee_id' => 'JDP', 'first_name' => 'Joint Director', 'last_name' => 'Project', 'email' => 'jdp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 14, "is_divisional_director" => 0, 'mobile_one' => '01711111213'],
            18 => ['employee_id' => 'DDP', 'first_name' => 'Deputy Director', 'last_name' => 'Project', 'email' => 'ddp@gmail.com', 'gender' => 'Male', 'department_id' => 2, 'designation_id' => 15, "is_divisional_director" => 0, 'mobile_one' => '01721111113'],

        );

        foreach ($employees as $employee) {
            DB::table('employees')->insert($employee);
            $user = [];
            $user['name'] = $employee['first_name'] . " " . $employee['last_name'];
            $user['email'] = $employee['email'];
            $user['password'] = '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS';//  123123
            $user['username'] = $employee['employee_id'];
            $user['user_type'] = 'Employee';
            $user['mobile'] = $employee['mobile_one'];
            $user['reference_table_id'] = $count++;
            if ($employee['employee_id']!='DG1'){
                \App\Entities\User::create($user);
            }
        }
    }
}