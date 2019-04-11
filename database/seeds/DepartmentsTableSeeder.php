<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('departments')->delete();

        \DB::table('departments')->insert(array (
            0 => array (
                'id' => 1,
                'name' => 'Research Management System',
                'department_code' => 'RMS',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            1 => array (
                'id' => 2,
                'name' => 'Project Management System',
                'department_code' => 'PMS',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            2 => array (
                'id' => 3,
                'name' => 'Accounts',
                'department_code' => 'AC',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            3 => array (
                'id' => 4,
                'name' => 'Information Technology',
                'department_code' => 'IT',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            4 => array (
                'id' => 5,
                'name' => 'Human Resource Management',
                'department_code' => 'HRM',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            5 => array (
                'id' => 6,
                'name' => 'Engineering Department',
                'department_code' => 'ED',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            6 => array (
                'id' => 7,
                'name' => 'Training Department',
                'department_code' => 'TD',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            7 => array (
                'id' => 8,
                'name' => 'Hostel Department',
                'department_code' => 'HD',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            8 => array (
                'id' => 9,
                'name' => 'Administration',
                'department_code' => 'ADMIN',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));


    }
}