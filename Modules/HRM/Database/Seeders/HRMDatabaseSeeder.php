<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\AcademicDegree;

class HRMDatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		// $this->call("OthersTableSeeder");
		$this->call( AcademicInstituteTableSeeder::class );
		$this->call( AcademicDepartmentsTableSeeder::class );
		$this->call( EmployeeDepartmentsTableSeeder::class );
		$this->call( EmployeeDesignationTableSeeder::class );
$this->call(AcademicDegreeTableSeeder::class);

	}
}
