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
            3 => 
            array (
                'id' => 4,
                'name' => 'Hostel Manager',
                'email' => 'hm@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'username' => 'hostelmanager',
                'user_type' => 'Employee',
                'mobile' => '01710000000',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:28:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Faculty Member',
                'email' => 'f@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$t7DT/V5rsEfKOFg.wN43w.fq4vPecvTWT8vMU5TijlIzkme41uiPu',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:28:52',
                'updated_at' => '2019-02-07 21:30:27',
                'username' => 'FM10',
                'user_type' => 'Employee',
                'mobile' => '01711111111',
                'reference_table_id' => 1,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:30:27',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Faculty Director',
                'email' => 'fd@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DrRY7lrML60DP7U80PwQ2uY.3yhLfwcEVT5GZkbpAJwwK/WOq0/6a',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:28:52',
                'updated_at' => '2019-02-07 21:32:25',
                'username' => 'FD11',
                'user_type' => 'Employee',
                'mobile' => '01711111112',
                'reference_table_id' => 2,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:32:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Research Director',
                'email' => 'rd@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$JJky5rIcxcuO8ZVQQOUv7OuTKxgLc9feSA1B1u6RNHUkly/cmJMJa',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:28:52',
                'updated_at' => '2019-02-07 21:33:04',
                'username' => 'RD12',
                'user_type' => 'Employee',
                'mobile' => '01711111113',
                'reference_table_id' => 3,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:33:04',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Project Director',
                'email' => 'pd1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2mySmeP6R6VyHATNwrmtm.ES.o2m7hSQsYhBhbOlANAxYLmoObQ02',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:28:52',
                'updated_at' => '2019-02-07 21:41:01',
                'username' => 'PD1',
                'user_type' => 'Employee',
                'mobile' => '01711111113',
                'reference_table_id' => 4,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:41:01',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'মহিউদ্দিন জাহাঙ্গীর',
                'email' => 'employee1@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$F2SY335ixWuYG3T2w77.oeEZoPkVUBUpdt/wknPX7CjS7u9Xq1xwu',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'username' => '10001',
                'user_type' => 'Employee',
                'mobile' => '01254487444',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'হামিদুর রহমান',
                'email' => 'employee2@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$t/ds4yWuQTKJ5SFLMUDgFu6s5JnHNKPJofqKWxxTBvpybxxX5lJCq',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'username' => '20001',
                'user_type' => 'Employee',
                'mobile' => '01254487445',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'মতিউর আমিন',
                'email' => 'employee3@bard.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3z2U/3XbHWIzh8IsSk3/me6O/YtSs187xWEIENo6/QDNqeAQh/IE2',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'username' => '30001',
                'user_type' => 'Employee',
                'mobile' => '01254487446',
                'reference_table_id' => NULL,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Researcher',
                'email' => 'researcher@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2mySmeP6R6VyHATNwrmtm.ES.o2m7hSQsYhBhbOlANAxYLmoObQ02',
                'remember_token' => NULL,
                'created_at' => '2019-02-07 21:28:52',
                'updated_at' => '2019-02-07 21:41:01',
                'username' => 'researcher',
                'user_type' => 'Employee',
                'mobile' => '01711111113',
                'reference_table_id' => 5,
                'status' => 'Active',
                'deleted_at' => NULL,
                'last_password_change' => '2019-02-07 21:41:01',
            ),
        ));
        
        
    }
}