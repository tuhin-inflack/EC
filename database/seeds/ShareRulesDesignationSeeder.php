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
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => true],

//                ADR
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4, 'can_approve' => false, 'is_parent' => false],

//                JD
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5, 'can_approve' => false, 'is_parent' => false],

//                DDR
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4, 'can_approve' => false, 'is_parent' => false],

//               DG
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1, 'can_approve' => false, 'is_parent' => true],


//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 13, 'designation' => 'Asst. Director Project'],
//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 15, 'designation' => 'Deputy Director Project'],

                // Director Project
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 8 , 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 10, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 11, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 12, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],


//                ADP
                ['share_rule_id' => 8, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 8, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9, 'can_approve' => false, 'is_parent' => false],

//                JDP
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 8, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 10, 'can_approve' => false, 'is_parent' => false],

//                DDP
                ['share_rule_id' => 10, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 10, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 11, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 11, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 12, 'can_approve' => true, 'is_parent' => false],

//               DG
                ['share_rule_id' => 12, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 11, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 12, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2, 'can_approve' => false, 'is_parent' => true],
            ]
        );
    }
}
