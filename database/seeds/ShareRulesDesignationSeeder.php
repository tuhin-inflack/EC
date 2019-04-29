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
                /*
                 * All share rules for brief for research
                 */
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 1, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],

//                ADR
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 3, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                JDR
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 3,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 4, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 5,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                DDR
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 5, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 4,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//               DG
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 6, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 7,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 6,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 7, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 1,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],


                /*
                 * All share rules for details for research
                 *
                 */
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 15,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 16,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 17,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 18,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 19,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 13, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],

//                ADR
                ['share_rule_id' => 15, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 15, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 16,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                JDR
                ['share_rule_id' => 16, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 16, 'department_id' => 1, 'designation_id' => 18, 'is_sharable' => true, 'sharable_id' => 15,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 16, 'department_id' => 1, 'designation_id' => 20, 'is_sharable' => true, 'sharable_id' => 17,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                DDR
                ['share_rule_id' => 17, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 16,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 17, 'department_id' => 1, 'designation_id' => 19, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//               DG
                ['share_rule_id' => 18, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 18, 'department_id' => 1, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 19,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 19, 'department_id' => 1, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 18,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 19, 'department_id' => 1, 'designation_id' => 22, 'is_sharable' => true, 'sharable_id' => 13,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],



//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 13, 'designation' => 'Asst. Director Project'],
//                ['share_rule_id' => 2,  'department_id' =>2,  'department' => 'Project Management System', 'designation_id' => 15, 'designation' => 'Deputy Director Project'],

                /*
                 * Project Proposal Brief sharing rules
                 */
                // Director Project
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 8 ,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9, 'can_reject' => false,'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 10,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 11,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 12,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 2, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],


//                ADP
                ['share_rule_id' => 8, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 8, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                JDP
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 8,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 9, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 10,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                DDP
                ['share_rule_id' => 10, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 10, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 9,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 11, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 11, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 12,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],

//               DG
                ['share_rule_id' => 12, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 11,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 12, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 2,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],

                /*
                 * Project Proposal Detail sharing rules
                 */
                // Director Project
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 20 ,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 21, 'can_reject' => false,'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 22,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 23,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 24,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],
                ['share_rule_id' => 14, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],

//                ADP
                ['share_rule_id' => 20, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 20, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 21,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                JDP
                ['share_rule_id' => 21, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 21, 'department_id' => 2, 'designation_id' => 13, 'is_sharable' => true, 'sharable_id' => 20,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 21, 'department_id' => 2, 'designation_id' => 15, 'is_sharable' => true, 'sharable_id' => 22,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//                DDP
                ['share_rule_id' => 22, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 22, 'department_id' => 2, 'designation_id' => 14, 'is_sharable' => true, 'sharable_id' => 21,'can_reject' => false, 'can_approve' => false, 'is_parent' => false],

//               ADG
                ['share_rule_id' => 23, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
                ['share_rule_id' => 23, 'department_id' => 2, 'designation_id' => 17, 'is_sharable' => true, 'sharable_id' => 24,'can_reject' => true, 'can_approve' => true, 'is_parent' => false],

//               DG
                ['share_rule_id' => 24, 'department_id' => 2, 'designation_id' => 16, 'is_sharable' => true, 'sharable_id' => 23,'can_reject' => true, 'can_approve' => false, 'is_parent' => false],
                ['share_rule_id' => 24, 'department_id' => 2, 'designation_id' => 23, 'is_sharable' => true, 'sharable_id' => 14,'can_reject' => true, 'can_approve' => false, 'is_parent' => true],
            ]
        );
    }
}
