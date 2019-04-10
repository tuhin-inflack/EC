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
                'migration' => '2019_02_10_150602_create_draft_proposal_budgets_table',
                'batch' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2019_02_10_171015_create_draft_proposal_budget_fiscal_values_table',
                'batch' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2019_02_10_193948_edit_designation_id_to_employees_table',
                'batch' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2019_02_13_122335_add_nationality_to_room_booking_guest_infos_table',
                'batch' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'migration' => '2019_02_17_163322_create_divisions_table',
                'batch' => 1,
            ),
            97 => 
            array (
                'id' => 98,
                'migration' => '2019_02_17_164000_create_districts_table',
                'batch' => 1,
            ),
            98 => 
            array (
                'id' => 99,
                'migration' => '2019_02_17_164127_create_thanas_table',
                'batch' => 1,
            ),
            99 => 
            array (
                'id' => 100,
                'migration' => '2019_02_17_164636_create_unions_table',
                'batch' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'migration' => '2019_02_20_121439_add_addresses_columns_to_organiations_table',
                'batch' => 1,
            ),
            101 => 
            array (
                'id' => 102,
                'migration' => '2019_02_24_141051_update_attributes_table',
                'batch' => 1,
            ),
            102 => 
            array (
                'id' => 103,
                'migration' => '2019_02_24_142135_update_attribute_values_table',
                'batch' => 1,
            ),
            103 => 
            array (
                'id' => 104,
                'migration' => '2019_02_24_150236_delete_status_field_to_research_table',
                'batch' => 1,
            ),
            104 => 
            array (
                'id' => 105,
                'migration' => '2019_02_24_150659_add_status_fields_to_research_table',
                'batch' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'migration' => '2019_02_25_160754_create_research_publications_table',
                'batch' => 1,
            ),
            106 => 
            array (
                'id' => 107,
                'migration' => '2019_02_25_161456_create_research_publication_attachments_table',
                'batch' => 1,
            ),
            107 => 
            array (
                'id' => 108,
                'migration' => '2019_02_25_182053_create_attribute_plannings_table',
                'batch' => 1,
            ),
            108 => 
            array (
                'id' => 109,
                'migration' => '2019_03_02_170543_create_economy_heads_table',
                'batch' => 1,
            ),
            109 => 
            array (
                'id' => 110,
                'migration' => '2019_03_03_110040_add_get_back_status_btn_label_back_to_rule_workflow_rule_details_table',
                'batch' => 1,
            ),
            110 => 
            array (
                'id' => 111,
                'migration' => '2019_03_03_175457_create_share_conversations_table',
                'batch' => 1,
            ),
            111 => 
            array (
                'id' => 112,
                'migration' => '2019_03_03_175530_create_share_rules_table',
                'batch' => 1,
            ),
            112 => 
            array (
                'id' => 113,
                'migration' => '2019_03_03_180649_create_share_rules_designations_table',
                'batch' => 1,
            ),
            113 => 
            array (
                'id' => 114,
                'migration' => '2019_03_03_191559_create_project_training_table',
                'batch' => 1,
            ),
            114 => 
            array (
                'id' => 115,
                'migration' => '2019_03_03_192209_create_research_budgets_table',
                'batch' => 1,
            ),
            115 => 
            array (
                'id' => 116,
                'migration' => '2019_03_06_160537_create_project_training_members_table',
                'batch' => 1,
            ),
            116 => 
            array (
                'id' => 117,
                'migration' => '2019_03_07_174336_edit_message_type_to_workflow_conversations_table',
                'batch' => 1,
            ),
            117 => 
            array (
                'id' => 118,
                'migration' => '2019_03_07_175311_add_message_field_to_workflow_conversations_table',
                'batch' => 1,
            ),
            118 => 
            array (
                'id' => 119,
                'migration' => '2019_03_10_151016_create_fiscal_years_table',
                'batch' => 1,
            ),
            119 => 
            array (
                'id' => 120,
                'migration' => '2019_03_14_180529_create_registered_trainee_generalInfos_table',
                'batch' => 1,
            ),
            120 => 
            array (
                'id' => 121,
                'migration' => '2019_03_14_184819_create_registered_trainee_service_table',
                'batch' => 1,
            ),
            121 => 
            array (
                'id' => 122,
                'migration' => '2019_03_14_190954_create_registered_trainee_emergency_table',
                'batch' => 1,
            ),
            122 => 
            array (
                'id' => 123,
                'migration' => '2019_03_18_131634_create_registered_trainee_education_table',
                'batch' => 1,
            ),
            123 => 
            array (
                'id' => 124,
                'migration' => '2019_03_18_155128_add_columns_to_trainees_table',
                'batch' => 1,
            ),
            124 => 
            array (
                'id' => 125,
                'migration' => '2019_03_18_162314_update_trainees_table',
                'batch' => 1,
            ),
            125 => 
            array (
                'id' => 126,
                'migration' => '2019_03_19_161725_create_trainee_diseases_table',
                'batch' => 1,
            ),
            126 => 
            array (
                'id' => 127,
                'migration' => '2019_03_21_102834_update_registered_trainee_emergency_table',
                'batch' => 1,
            ),
            127 => 
            array (
                'id' => 128,
                'migration' => '2019_03_24_124216_add_default_value_to_hostel_budget_titles_table',
                'batch' => 1,
            ),
            128 => 
            array (
                'id' => 129,
                'migration' => '2019_03_28_142227_create_registered_trainee_physicalInfos_table',
                'batch' => 1,
            ),
            129 => 
            array (
                'id' => 130,
                'migration' => '2019_03_30_194712_add_duration_and_budget_to_project_table',
                'batch' => 1,
            ),
            130 => 
            array (
                'id' => 131,
                'migration' => '2019_03_31_125341_update_registered_trainee_physicalInfos_table',
                'batch' => 1,
            ),
            131 => 
            array (
                'id' => 132,
                'migration' => '2019_04_01_123332_add_age_field_to_organization_member',
                'batch' => 1,
            ),
            132 => 
            array (
                'id' => 133,
                'migration' => '2019_04_01_153625_create_registered_trainee_healthExam_table',
                'batch' => 1,
            ),
            133 => 
            array (
                'id' => 134,
                'migration' => '2019_04_03_154506_create_research_detail_submissions_table',
                'batch' => 1,
            ),
            134 => 
            array (
                'id' => 135,
                'migration' => '2019_04_03_161913_create_research_detail_submission_attachments',
                'batch' => 1,
            ),
            135 => 
            array (
                'id' => 136,
                'migration' => '2019_04_03_172933_create_project_request_details_table',
                'batch' => 1,
            ),
            136 => 
            array (
                'id' => 137,
                'migration' => '2019_04_04_130935_create_research_detail_invitations_table',
                'batch' => 1,
            ),
            137 => 
            array (
                'id' => 138,
                'migration' => '2019_04_04_131026_create_research_detail_invitation_attachments_table',
                'batch' => 1,
            ),
            138 => 
            array (
                'id' => 139,
                'migration' => '2019_04_04_131834_create_research_detail_invitation_receivers_table',
                'batch' => 1,
            ),
            139 => 
            array (
                'id' => 140,
                'migration' => '2019_04_04_160016_create_project_detail_proposals_table',
                'batch' => 1,
            ),
            140 => 
            array (
                'id' => 141,
                'migration' => '2019_04_04_183727_create_project_detail_proposal_attachments_table',
                'batch' => 1,
            ),
            141 => 
            array (
                'id' => 142,
                'migration' => '2019_04_05_014004_update_research_detail_invitations_table',
                'batch' => 1,
            ),
            142 => 
            array (
                'id' => 143,
                'migration' => '2019_04_05_072351_drop_research_detail_invitation_receivers_table',
                'batch' => 1,
            ),
            143 => 
            array (
                'id' => 144,
                'migration' => '2019_04_05_080951_update_project_request_details_table',
                'batch' => 1,
            ),
            144 => 
            array (
                'id' => 145,
                'migration' => '2019_04_05_081742_create_project_request_detail_attachments_table',
                'batch' => 1,
            ),
            145 => 
            array (
                'id' => 146,
                'migration' => '2019_04_07_152551_update_share_rule_designations_table',
                'batch' => 1,
            ),
            146 => 
            array (
                'id' => 147,
                'migration' => '2019_04_07_173654_update_share_rule_conversation_table',
                'batch' => 1,
            ),
            147 => 
            array (
                'id' => 148,
                'migration' => '2019_04_07_232313_add_is_divisional_director_to_employees_table',
                'batch' => 1,
            ),
            148 => 
            array (
                'id' => 149,
                'migration' => '2019_04_08_174903_nullable_department_id_to_share_conversations_table',
                'batch' => 1,
            ),
            149 => 
            array (
                'id' => 150,
                'migration' => '2019_04_09_113212_add_is_parent_to_share_rules_designations',
                'batch' => 1,
            ),
            150 => 
            array (
                'id' => 151,
                'migration' => '2019_04_09_130627_add_can_approve_to_workflow_rule_details_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}