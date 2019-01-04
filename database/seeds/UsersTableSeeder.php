<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            (object)[
                'name' => 'BARD',
                'email' => 'bard@erp.com',
                'username' => 'bard',
                'password' => '$2y$10$BTrCiO0lmLD94Nwsj23l5eedjtnDOKFBNaOJoMRirjIJLkqMf/YR2', // bard789
                'user_type' => 'Guest',
                'mobile' => '01710000000',
                'last_password_change' => date('Y-m-d H:i:s')
            ],
            (object)[
                'name' => 'Hasib',
                'email' => 'hasib@brainstation-23.com',
                'username' => 'hasib',
                'password' => '$2y$10$fpl4aKLzKDhCm9DCNHWcMebhsYr9JEoRefb8Eot2l/ddSASRtd6gK',
                'user_type' => 'Admin',
                'mobile' => '01719117792',
                'last_password_change' => date('Y-m-d H:i:s')
            ],
            (object)[
                'name' => 'Director Admin',
                'email' => 'dg@abc.com',
                'username' => 'directoradmin',
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS', // 123123
                'user_type' => 'Admin',
                'mobile' => '01710000000',
                'last_password_change' => date('Y-m-d H:i:s')
            ],
            (object)[
                'name' => 'Hostel Manager',
                'email' => 'hm@test.com',
                'username' => 'hostelmanager',
                'password' => '$2y$10$Hy3h5XfdQK2e3cgke7ebHevS4E7no2Z6149YDVKS5t7WJ7Y9pJyrS', // 123123
                'user_type' => 'Admin',
                'mobile' => '01710000000',
                'last_password_change' => date('Y-m-d H:i:s')
            ],
        ];

        foreach ($users as $user) {
            $createdUserId = DB::table('users')->insertGetId([
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'password' => $user->password,
                'user_type' => $user->user_type,
                'mobile' => $user->mobile,
                'last_password_change' => $user->last_password_change,
            ]);

            if ($user->username == 'directoradmin') {
                $roleId = DB::table('roles')->insertGetId([
                    'name' => 'ROLE_DIRECTOR_ADMIN',
                    'description' => 'Has admin role'
                ]);
                DB::table('role_user')->insert([
                    'role_id' => $roleId,
                    'user_id' => $createdUserId,
                ]);
            }

            if ($user->username == 'hostelmanager') {
                $roleIdHm = DB::table('roles')->insertGetId([
                    'name' => 'ROLE_HOSTEL_MANAGER',
                    'description' => 'Has hostel access',
                ]);
                DB::table('role_user')->insert([
                    'role_id' => $roleIdHm,
                    'user_id' => $createdUserId,
                ]);
            }
        }

    }
}
