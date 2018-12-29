<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            (object)[
                'name' => 'Tanvir Hossain',
                'email' => 'tanvir@inflack.com',
                'username' => 'tanvir',
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS', // 123123
                'user_type' => 'Admin',
                'mobile' => '01710000000',
                'last_password_change' => date('Y-m-d H:i:s')
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'password' => $user->password,
                'user_type' => $user->user_type,
                'mobile' => $user->mobile,
                'last_password_change' => $user->last_password_change,
            ]);
        }

    }
}
