<?php

use Illuminate\Database\Seeder;

class AcademicDegreeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('academic_degree')->delete();
        
        \DB::table('academic_degree')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'B.Sc in CSE',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'BBA',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'MBA',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hons in English',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hons in Bangla',
                'short_name' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}