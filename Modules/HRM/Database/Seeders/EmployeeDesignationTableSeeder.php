<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Designation;

class EmployeeDesignationTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		// $this->call("OthersTableSeeder");
		$dummyDesignations = [
			[
				'name'            => 'JR Accounts Officer',
			],

			[
				'name'            => 'Accounts Officer',
			],
			[
				'name'            => 'Sr Accounts Officer',
			],

			[
				'name'            => 'Jr IT Officer',
			],
			[
				'name'            => 'IT Officer',
			],
			[
				'name'            => 'Senior IT Officer',
			],

			[
				'name'            => 'Jr HR Executive',
			],
			[
				'name'            => 'Senior HR Executive',
			]

		];
		foreach ( $dummyDesignations as $designation ) {
			Designation::create( $designation );
		}
	}
}
