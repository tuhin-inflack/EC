<?php

use Illuminate\Database\Seeder;

class NotificationTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('notification_types')->delete();
        \DB::table('notification_types')->insert(
            [
                0 => [
                    'name' => 'Research Proposal Notification',
                    'description' => 'Notification for any activity regrading research proposal',
                    'is_application_notification' => 1,
                    'is_email_notification' => 0,
                    'is_sms_notification' => 0,
                    'icon_name' => '',
                ],

                1 => [
                    'name' => 'Project Proposal Submission',
                    'description' => 'Notification for any activity regrading project proposal',
                    'is_application_notification' => 1,
                    'is_email_notification' => 0,
                    'is_sms_notification' => 0,
                    'icon_name' => '',
                ]

            ]
        );
    }
}