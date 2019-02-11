<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2018_10_08_110954_create_room_types_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2018_10_08_111141_create_hostels_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2018_10_08_111310_create_rooms_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2018_10_08_111628_create_room_inventories_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2018_10_08_111751_create_hostel_room_type_rates_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2018_10_09_074323_create_account_heads_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2018_10_09_074728_create_account_ledgers_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2018_10_09_123625_create_roles_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2018_10_09_123700_create_role_user_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2018_10_09_123738_create_permissions_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2018_10_09_123804_create_permission_role_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2018_10_18_130509_create_employee_general_infos_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2018_10_18_132514_create_employee_personal_infos_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2018_10_18_133400_create_employee_educations_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2018_10_18_133909_create_employee_trainings_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2018_10_18_134304_create_employee_publications_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2018_10_18_140437_create_employee_research_infos_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2018_10_24_113236_create_project_request_forward_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2018_10_28_114339_create_departments_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2018_10_28_114617_create_designations_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2018_11_25_111601_create_academic_institutes_table',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2018_11_27_064548_add_username_mobile_user_type_reference_table_id_users_table',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2018_11_28_081842_create_academic_departments_table',
                'batch' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2018_11_29_094154_create_academic_degree_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2018_12_03_061022_add_last_password_change_users_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2018_12_03_063717_add_photo_to_employee_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2018_12_03_075008_add_organization_website_to_employee_trainings_table',
                'batch' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2018_12_03_114651_change_to_employee_personal_info_table',
                'batch' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2018_12_05_105916_create_hostel_budget_sections_table',
                'batch' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2018_12_06_072955_create_hostel_budget_titles_table',
                'batch' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2018_12_06_101009_create_room_bookings_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2018_12_06_101506_create_room_booking_requesters_table',
                'batch' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2018_12_06_102804_create_room_booking_referees_table',
                'batch' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2018_12_06_103440_create_booking_room_infos_table',
                'batch' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2018_12_06_103801_create_booking_guest_infos_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2018_12_09_062849_create_hostel_budgets_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2018_12_11_070539_create_project_requests_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2018_12_12_060700_add_status_to_hostel_budget_titles_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2018_12_13_082056_create_project_proposals_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2018_12_13_082235_create_project_proposal_files_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2018_12_23_135306_create_research_requests_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2018_12_24_103132_create_trainings_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2018_12_26_120751_add_column_to_trainings',
                'batch' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2018_12_27_103732_create_trainees_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2018_12_31_050248_create_checkin_details_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2018_12_31_074920_add_status_rooms_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2018_12_31_123647_add_status_booking_guest_infos_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2019_01_02_111111_create_booking_checkings_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2019_01_03_085547_create_checkin_payments_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2019_01_04_132929_add_training_id_room_bookings_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2019_01_05_105523_create_checkin_room_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2019_01_08_085454_add_comment_room_bookings_table',
                'batch' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2019_01_10_072740_create_research_request_attachments_table',
                'batch' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2019_01_10_072756_create_research_request_receivers_table',
                'batch' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2019_01_10_095000_update_research_requests_table',
                'batch' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2019_01_14_120700_create_research_proposal_date_extend_requests_table',
                'batch' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2019_01_15_130110_create_tasks_table',
                'batch' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2019_01_15_130432_create_project_research_tasks_table',
                'batch' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2019_01_15_132328_create_task_attachments_table',
                'batch' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2019_01_15_134806_create_task_comments_table',
                'batch' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'migration' => '2019_01_15_161613_create_organizations_table',
                'batch' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'migration' => '2019_01_15_183145_create_attributes_table',
                'batch' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'migration' => '2019_01_15_190247_create_research_proposal_submissions_table',
                'batch' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'migration' => '2019_01_16_125230_update_research_proposal_submissions_table',
                'batch' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'migration' => '2019_01_16_125556_create_research_proposal_submission_attachments_table',
                'batch' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'migration' => '2019_01_16_173114_create_attribute_values_table',
                'batch' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'migration' => '2019_01_17_120417_create_workflow_masters_table',
                'batch' => 1,
            ),
            69 => 
            array (
                'id' => 70,
                'migration' => '2019_01_17_122146_create_workflow_details_table',
                'batch' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'migration' => '2019_01_17_122956_create_organization_members_table',
                'batch' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'migration' => '2019_01_17_192606_create_booking_request_forwards_table',
                'batch' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'migration' => '2019_01_20_135855_create_organizables_table',
                'batch' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'migration' => '2019_01_20_152904_create_workflow_conversations_table',
                'batch' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'migration' => '2019_01_20_165151_create_workflow_rule_masters_table',
                'batch' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'migration' => '2019_01_20_171317_create_workflow_rule_details_table',
                'batch' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'migration' => '2019_01_20_180633_create_features_table',
                'batch' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'migration' => '2019_01_21_143330_update_research_request_attachments_table',
                'batch' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'migration' => '2019_01_22_172745_create_economy_codes_table',
                'batch' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'migration' => '2019_01_24_155225_create_monthly_updates_table',
                'batch' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'migration' => '2019_01_24_184422_create_research_table',
                'batch' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'migration' => '2019_01_27_115336_create_monthly_update_attachments_table',
                'batch' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'migration' => '2019_01_27_121321_create_projects_table',
                'batch' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'migration' => '2019_01_27_190856_create_project_request_receivers_table',
                'batch' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'migration' => '2019_01_27_191250_create_project_request_attachments_table',
                'batch' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'migration' => '2019_01_29_144952_create_notification_types_table',
                'batch' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'migration' => '2019_01_30_173155_create_remarks_table',
                'batch' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'migration' => '2019_01_30_192235_create_notifications_table',
                'batch' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'migration' => '2019_01_31_182814_edit_enum_type_to_research_proposal_submissions_table',
                'batch' => 1,
            ),
            89 => 
            array (
                'id' => 90,
                'migration' => '2019_01_31_184622_add_status_to_research_proposal_submissions_table',
                'batch' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'migration' => '2019_01_31_200320_drop_column_in_project_proposals_table',
                'batch' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'migration' => '2019_01_31_200559_add_column_in_project_proposals_table',
                'batch' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'migration' => '2019_02_04_205932_create_project_budgets_table',
                'batch' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2019_02_04_205935_create_project_budget_fiscal_values_table',
                'batch' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2019_02_05_150356_create_research_budgets_table',
                'batch' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2019_02_05_150501_create_research_budget_fiscal_values_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}