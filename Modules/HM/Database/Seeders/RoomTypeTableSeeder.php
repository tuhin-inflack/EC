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

        $words = ['এসি', 'এসি ডিলাক্স', 'সাধারণ'];
        $max = count($words) - 1;

        for($i = 0; $i < 3; $i++)
        {
            RoomType::create([
                'name' => $words[rand(0, $max)],
                'capacity' => rand(1, 4),
                'general_rate' => rand(500, 1500),
                'govt_rate' => rand(100, 900),
                'bard_emp_rate' => rand(100, 900),
                'special_rate' => rand(100, 800),
            ]);
        }
    }
}
