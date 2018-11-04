<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\EmployeeDesignation;

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
				'department_code' => 'AC',
			],

			[
				'name'            => 'Accounts Officer',
				'department_code' => 'AC',
			],
			[
				'name'            => 'Sr Accounts Officer',
				'department_code' => 'AC',
			],

			[
				'name'            => 'Jr IT Officer',
				'department_code' => 'IT',
			],
			[
				'name'            => 'IT Officer',
				'department_code' => 'IT',
			],
			[
				'name'            => 'Senior IT Officer',
				'department_code' => 'IT',
			],

			[
				'name'            => 'Jr HR Executive',
				'department_code' => 'HRM',
			],
			[
				'name'            => 'Senior HR Executive',
				'department_code' => 'HRM',
			],
			[
				'name'            => 'Asst HR Manager',
				'department_code' => 'HRM',
			],
			[
				'name'            => 'HR Manager',
				'department_code' => 'HRM',
			],

			[
				'name'            => 'JR Software Engineer',
				'department_code' => 'ED',
			],
			[
				'name'            => 'Sr Software Engineer',
				'department_code' => 'ED',
			],

		];
		foreach ( $dummyDesignations as $designation ) {
			EmployeeDesignation::create( $designation );
		}
	}
}
