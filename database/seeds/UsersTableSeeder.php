<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		for ( $i = 0; $i < 10; $i ++ ) {

			DB::table('users')->insert([
				'name'      => str_random( 10 ),
				'email'     => strtolower(str_random( 10 ) . '@gmail.com'),
				'username' =>uniqid(),
				'password'  => '$2y$10$Zq9mUXf8xF75dP6k4SYeSupT90IeWsGgbXGewFddk9v2y4BQ/ofxa',
				'user_type' => 'Guest',
				'mobile' => '01717613327'

			]);
		}
	}
}
