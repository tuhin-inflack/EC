<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Director General',
                'email' => 'dg@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'username' => 'directorgeneral',
                'user_type' => 'Admin',
                'mobile' => '01710000000',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:28:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Director Admin',
                'email' => 'da@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'username' => 'directoradmin',
                'user_type' => 'Admin',
                'mobile' => '01710000000',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:28:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Director Training',
                'email' => 'dt@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'username' => 'directortraining',
                'user_type' => 'Admin',
                'mobile' => '01711111111',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:28:52',
            ),
        ));
    }
}