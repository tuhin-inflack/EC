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
                ['name' => 'Research Sharing Rule', 'is_group' =>1],
                ['name' => 'Project Sharing Rule', 'is_group' =>1],
            ]
        );
    }
}
