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
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7],

//                ADR
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1],
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4],

//                JD
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5],

//                DDR
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1],
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4],

//               DG
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1],
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7],

//               ADG
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6],
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1],


//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 13, 'designation' => 'Asst. Director Project'],
//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 15, 'designation' => 'Deputy Director Project'],
            ]
        );
    }
}
