<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'user_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 4,
                'user_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 6,
                'user_id' => 5,
                'created_at' => '2019-02-07 21:30:40',
                'updated_at' => '2019-02-07 21:30:40',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'user_id' => 6,
                'created_at' => '2019-02-07 21:32:39',
                'updated_at' => '2019-02-07 21:32:39',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 5,
                'user_id' => 7,
                'created_at' => '2019-02-07 21:33:16',
                'updated_at' => '2019-02-07 21:33:16',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'user_id' => 8,
                'created_at' => '2019-02-07 21:41:18',
                'updated_at' => '2019-02-07 21:41:18',
            ),
            8 =>
            array (
                'id' => 9,
                'role_id' => 7,
                'user_id' => 8,
                'created_at' => '2019-02-07 21:41:18',
                'updated_at' => '2019-02-07 21:41:18',
            ),
            9 =>
            array (
                'id' => 10,
                'role_id' => 8,
                'user_id' => 13,
                'created_at' => '2019-02-07 21:41:18',
                'updated_at' => '2019-02-07 21:41:18',
            ),
        ));
        
        
    }
}