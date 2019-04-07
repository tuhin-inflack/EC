<?php

use Illuminate\Database\Seeder;

class ShareRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('share_rules')->truncate();

        \DB::table('share_rules')->insert([
                1 => ['name' => 'Research Brief Sharing Rule - Director research will share with, ADR, JD, DDR, DG and ADG', 'is_group' => 1],
                2 => ['name' => 'Project Sharing Rule', 'is_group' => 1],
                3 => ['name' => 'ADR will share with DR and JD', 'is_group' => 1],
                4 => ['name' => 'JD can share with DR, ADR, DDR', 'is_group' => 1],
                5 => ['name' => 'DDR can share with JD and DR', 'is_group' => 1],
                6 => ['name' => 'DG can share with DR and ADG', 'is_group' => 1],
                7 => ['name' => 'ADG can share with DG and DR', 'is_group' => 1],
            ]
        );
    }
}
