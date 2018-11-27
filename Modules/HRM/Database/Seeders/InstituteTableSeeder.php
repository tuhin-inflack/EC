<?php

namespace Modules\HRM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Institute;

class InstituteTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		// $this->call("OthersTableSeeder");
		$institutes = [
			[
				'name'       => 'American International University',
				'short_name' => 'AIUB',
			],
			[
				'name'       => 'Bangladesh University of Engineering & Technology',
				'short_name' => 'BUET',
			],
			[
				'name'       => 'Dhaka University of Engineering & Technology',
				'short_name' => 'DUET',
			],
			[
				'name'       => 'Khulna University of  Engineering & Technology',
				'short_name' => 'KUET',
			],
			[
				'name'       => 'Rajshahi University of  Engineering & Technology',
				'short_name' => 'RUET',
			],
			[
				'name'       => 'University of Dhaka',
				'short_name' => 'DU',
			],


		];
		foreach ( $institutes as $institute ) {
			Institute::create( $institute );
		}
	}
}
