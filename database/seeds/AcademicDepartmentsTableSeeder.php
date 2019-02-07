<?php

use Illuminate\Database\Seeder;

class AcademicDepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('academic_departments')->delete();
        
        \DB::table('academic_departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Arts and Humanities',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Science',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Finance',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Engineering',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}