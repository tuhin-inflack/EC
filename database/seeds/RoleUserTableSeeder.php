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
                'id' => 2,
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'role_id' => 6,
                'user_id' => 5,
                'created_at' => '2019-02-07 21:30:40',
                'updated_at' => '2019-02-07 21:30:40',
            ),
            2 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'user_id' => 6,
                'created_at' => '2019-02-07 21:32:39',
                'updated_at' => '2019-02-07 21:32:39',
            ),
            3 => 
            array (
                'id' => 7,
                'role_id' => 5,
                'user_id' => 7,
                'created_at' => '2019-02-07 21:33:16',
                'updated_at' => '2019-02-07 21:33:16',
            ),
            4 => 
            array (
                'id' => 10,
                'role_id' => 8,
                'user_id' => 13,
                'created_at' => '2019-02-07 21:41:18',
                'updated_at' => '2019-02-07 21:41:18',
            ),
            5 => 
            array (
                'id' => 11,
                'role_id' => 6,
                'user_id' => 1,
                'created_at' => '2019-04-10 20:18:35',
                'updated_at' => '2019-04-10 20:18:35',
            ),
            6 => 
            array (
                'id' => 12,
                'role_id' => 2,
                'user_id' => 4,
                'created_at' => '2019-04-10 20:26:14',
                'updated_at' => '2019-04-10 20:26:14',
            ),
            7 => 
            array (
                'id' => 13,
                'role_id' => 7,
                'user_id' => 4,
                'created_at' => '2019-04-10 20:26:14',
                'updated_at' => '2019-04-10 20:26:14',
            ),
            8 => 
            array (
                'id' => 14,
                'role_id' => 1,
                'user_id' => 8,
                'created_at' => '2019-04-10 20:27:31',
                'updated_at' => '2019-04-10 20:27:31',
            ),
            9 => 
            array (
                'id' => 15,
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => '2019-04-11 11:08:58',
                'updated_at' => '2019-04-11 11:08:58',
            ),
            10 => 
            array (
                'id' => 16,
                'role_id' => 2,
                'user_id' => 9,
                'created_at' => '2019-04-11 11:10:39',
                'updated_at' => '2019-04-11 11:10:39',
            ),
            11 => 
            array (
                'id' => 17,
                'role_id' => 3,
                'user_id' => 10,
                'created_at' => '2019-04-11 11:10:51',
                'updated_at' => '2019-04-11 11:10:51',
            ),
            12 => 
            array (
                'id' => 18,
                'role_id' => 4,
                'user_id' => 11,
                'created_at' => '2019-04-11 11:12:01',
                'updated_at' => '2019-04-11 11:12:01',
            ),
            13 => 
            array (
                'id' => 19,
                'role_id' => 5,
                'user_id' => 3,
                'created_at' => '2019-04-11 11:49:47',
                'updated_at' => '2019-04-11 11:49:47',
            ),
            14 =>
            array (
                'id' => 20,
                'role_id' => 5,
                'user_id' => 12,
                'created_at' => '2019-04-25 14:19:17',
                'updated_at' => '2019-04-25 14:19:17',
            ),
        ));
        
        
    }
}