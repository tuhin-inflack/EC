<?php

namespace Modules\HM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HM\Entities\RoomType;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        for($i = 0; $i < 10; $i++)
        {
            RoomType::create([
               'name' => 'Room Type ' . $i,
               'capacity' => rand(1, 5),
                'general_rate' => rand(100, 900),
                'govt_rate' => rand(100, 900),
                'bard_emp_rate' => rand(100, 900),
                'special_rate' => rand(100, 900),
            ]);
        }
    }
}
