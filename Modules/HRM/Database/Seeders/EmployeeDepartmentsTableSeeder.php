<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Department;
use Nwidart\Modules\Module;

class EmployeeDepartmentsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$dummyDepartments = [
			[
				'name'            => 'Accounts',
				'department_code' => 'AC',
			],
			[
				'name'            => 'Information Technology',
				'department_code' => 'IT',
			],
			[
				'name'            => 'Human Resource Management',
				'department_code' => 'HRM',
			],
			[
				'name'            => 'Engineering Department',
				'department_code' => 'ED',
			],
				[
				'name'            => 'Training Department',
				'department_code' => 'TD',
			],

		];
		foreach ($dummyDepartments as $department){
			Department::create( $department );
		}
	}
}
