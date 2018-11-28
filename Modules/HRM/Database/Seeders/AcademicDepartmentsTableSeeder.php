<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\AcademicDepartment;

class AcademicDepartmentsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		$academicDepartments =
			[
				'Arts and Humanities',
				'Business',
				'Science',
				'Finance',
				'Engineering',
			];
		foreach ( $academicDepartments as $department ) {
			AcademicDepartment::create( [ 'name' => $department ] );
		}
	}
}
