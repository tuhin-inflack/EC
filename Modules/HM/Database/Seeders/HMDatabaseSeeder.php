<?php

namespace Modules\HM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Prophecy\Doubler\Generator\TypeHintReference;

class HMDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

	    $this->call(HostelBudgetTitleTableSeeder::class);
	    $this->call(RoomTypeTableSeeder::class);
	    $this->call(RoomAndHostelTableSeeder::class);
	    $this->call(BookingRequestTableSeeder::class);
//	    $this->call(CheckInTableSeeder::class);
    }
}
