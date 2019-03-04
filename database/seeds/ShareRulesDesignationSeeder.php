<?php

use Illuminate\Database\Seeder;

class ShareRulesDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('share_rules_designations')->truncate();

        DB::table('share_rules_designations')->insert(
            [
                ['share_rule_id' => 1,  'department_id' =>1,  'department' => 'Research Management System', 'designation_id' => 18, 'designation' =>'Asst. Director Research'],
                ['share_rule_id' => 1,  'department_id' =>1,  'department' => 'Research Management System', 'designation_id' => 20, 'designation' => 'Deputy Director Research'],
                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 13, 'designation' => 'Asst. Director Project'],
                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 15, 'designation' => 'Deputy Director Project'],
            ]
        );
    }
}
