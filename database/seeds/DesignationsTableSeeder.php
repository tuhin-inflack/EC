<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('designations')->delete();
        
        \DB::table('designations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Faculty Member',
                'short_name' => 'FM',
                'department_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Faculty Director',
                'short_name' => 'FD',
                'department_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Research Director',
                'short_name' => 'RD',
                'department_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Project Director',
                'short_name' => 'PD',
                'department_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'JR Accounts Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Accounts Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sr Accounts Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jr IT Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'IT Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Senior IT Officer',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Jr HR Executive',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Senior HR Executive',
                'short_name' => NULL,
                'department_id' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Asst. Director Project',
                'short_name' => 'ADP',
                'department_id' => 2,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Joint Director Project',
                'short_name' => 'JDP',
                'department_id' => 2,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Deputy Director Project',
                'short_name' => 'DDP',
                'department_id' => 2,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Asst Director General',
                'short_name' => 'ADG',
                'department_id' => 2,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Director General',
                'short_name' => 'DG',
                'department_id' => 2,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Asst. Director Research',
                'short_name' => 'ADR',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Joint Director Research',
                'short_name' => 'JDR',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Deputy Director Research',
                'short_name' => 'DDR',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Director HR',
                'short_name' => 'DIRHR',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Director Research',
                'short_name' => 'DIRR',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Director Project',
                'short_name' => 'DIRP',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Director Hostel',
                'short_name' => 'DIRH',
                'department_id' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}