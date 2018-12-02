<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\AcademicDegree;

class AcademicDegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

	    $AcademicDegree =
		    [
			    'B.Sc in CSE',
			    'BBA',
			    'MBA',
			    'Hons in English',
			    'Hons in Bangla',
		    ];
	    foreach ( $AcademicDegree as $degree ) {
		    AcademicDegree::create( [ 'name' => $degree ] );
	    }
    }
}
