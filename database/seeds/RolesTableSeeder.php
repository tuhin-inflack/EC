<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ROLE_DIRECTOR_GENERAL',
                'description' => 'Has general admin role',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ROLE_DIRECTOR_ADMIN',
                'description' => 'Has admin role',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ROLE_DIRECTOR_TRAINING',
                'description' => 'Has Training access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ROLE_HOSTEL_MANAGER',
                'description' => 'Has hostel access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'ROLE_RESEARCH_DIRECTOR',
                'description' => 'Has research access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'ROLE_RESEARCHER',
                'description' => 'Has research access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'ROLE_PROJECT_DIRECTOR',
                'description' => 'Has project access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

            7 =>
            array (
                'id' => 8,
                'name' => 'ROLE_DIRECTOR_PROJECT',
                'description' => 'Has project access',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}