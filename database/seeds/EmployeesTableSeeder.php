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
        
        \DB::table('employees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'employee_id' => 'FM10',
                'first_name' => 'Faculty',
                'last_name' => 'Member',
                'photo' => NULL,
                'email' => 'f@gmail.com',
                'gender' => 'Male',
                'department_id' => 1,
                'designation_id' => '1',
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
            array (
                'id' => 2,
                'employee_id' => 'FD11',
                'first_name' => 'Faculty',
                'last_name' => 'Director',
                'photo' => NULL,
                'email' => 'fd@gmail.com',
                'gender' => 'Male',
                'department_id' => 1,
                'designation_id' => '2',
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
            array (
                'id' => 3,
                'employee_id' => 'RD12',
                'first_name' => 'Research',
                'last_name' => 'Director',
                'photo' => NULL,
                'email' => 'rd@gmail.com',
                'gender' => 'Male',
                'department_id' => 1,
                'designation_id' => '3',
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
            array (
                'id' => 4,
                'employee_id' => 'PD1',
                'first_name' => 'Project',
                'last_name' => 'Director',
                'photo' => NULL,
                'email' => 'pd1@gmail.com',
                'gender' => 'Male',
                'department_id' => 2,
                'designation_id' => '4',
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
            array (
                'id' => 5,
                'employee_id' => '10001',
                'first_name' => 'মহিউদ্দিন',
                'last_name' => 'জাহাঙ্গীর',
                'photo' => 'default-profile-picture.png',
                'email' => 'employee1@bard.com',
                'gender' => 'male',
                'department_id' => 1,
                'designation_id' => '2',
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
            array (
                'id' => 6,
                'employee_id' => '20001',
                'first_name' => 'হামিদুর',
                'last_name' => 'রহমান',
                'photo' => 'default-profile-picture.png',
                'email' => 'employee2@bard.com',
                'gender' => 'male',
                'department_id' => 2,
                'designation_id' => '6',
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
            array (
                'id' => 7,
                'employee_id' => '30001',
                'first_name' => 'মতিউর',
                'last_name' => 'আমিন',
                'photo' => 'default-profile-picture.png',
                'email' => 'employee3@bard.com',
                'gender' => 'male',
                'department_id' => 3,
                'designation_id' => '8',
                'status' => 'present',
                'tel_office' => '01254487446',
                'tel_home' => '01254487446',
                'mobile_one' => '01254487446',
                'mobile_two' => '01254487446',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}