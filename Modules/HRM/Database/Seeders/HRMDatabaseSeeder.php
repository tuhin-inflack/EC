<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HRMDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
	    $this->call(EmployeeDepartmentsTableSeeder::class);
	    $this->call(EmployeeDesignationTableSeeder::class);
	    $this->call(AcademicDepartmentsTableSeeder::class);
	    $this->call(AcademicInstituteTableSeeder::class);


    }
}
