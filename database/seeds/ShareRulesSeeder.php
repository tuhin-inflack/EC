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
                1 => ['name' => 'Research Brief Sharing Rule - Director research will share with, ADR, JD, DDR, DG and ADG', 'is_group' => 1],//(research brief sharing rules)
                2 => ['name' => 'Project Sharing Rule, Director project with ADP, JD, DDR, DG and ADG', 'is_group' => 1], // (project brief sharing rules)
                //research brief sharing rule
                3 => ['name' => 'ADR will share with DR and JDR', 'is_group' => 1],
                4 => ['name' => 'JDR can share with DR, ADR, DDR', 'is_group' => 1],
                5 => ['name' => 'DDR can share with JDP and DR', 'is_group' => 1],
                6 => ['name' => 'DG can share with DR and ADG', 'is_group' => 1],
                7 => ['name' => 'ADG can share with DG and DR', 'is_group' => 1],
                // project brief sharing rule
                8 => ['name' => 'ADP will share with PD and JDP', 'is_group' => 1],
                9 => ['name' => 'JDP can share with PD, ADP, DDP', 'is_group' => 1],
                10 => ['name' => 'DDP can share with JDP and PD', 'is_group' => 1],
                11 => ['name' => 'ADG can share with PD and DG', 'is_group' => 1],
                12 => ['name' => 'DG can share with ADG and PD', 'is_group' => 1],

                13 => ['name' => 'DR * Research Details Sharing Rule - Director research will share with, ADR, JD, DDR, DG and ADG', 'is_group' => 1], // (research detail sharing rules)
                14 => ['name' => 'Project Detail Sharing Rule, Director project with ADP, JD, DDR, DG and ADG', 'is_group' => 1],
                // research details sharing rule
                15 => ['name' => 'ADR will share with DR and JDR', 'is_group' => 1],
                16 => ['name' => 'JDR can share with DR, ADR, DDR', 'is_group' => 1],
                17 => ['name' => 'DDR can share with JDR and DR', 'is_group' => 1],
                18 => ['name' => 'DG can share with DR and ADG', 'is_group' => 1],
                19 => ['name' => 'ADG can share with DG and DR', 'is_group' => 1],
                // project details sharing rule
                20 => ['name' => 'ADP will share with PD and JDP', 'is_group' => 1],
                21 => ['name' => 'JDP can share with PD, ADP, DDP', 'is_group' => 1],
                22 => ['name' => 'DDP can share with JDP and PD', 'is_group' => 1],
                23 => ['name' => 'ADG can share with PD and DG', 'is_group' => 1],
                24 => ['name' => 'DG can share with ADG and PD', 'is_group' => 1],

                // research sharing rule
                25 => ['name' => 'DR Can Share With Any Employee', 'is_group' => 1],
                26 => ['name' => 'Any Employee Can Share with DR', 'is_group' => 1],
                27 => ['name' => 'DR Can Share with DG', 'is_group' => 1],
            ]
        );
    }
}
