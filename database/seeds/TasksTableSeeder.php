<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Review of literature',
                'expected_start_time' => '2019-03-04',
                'expected_end_time' => '2019-04-11',
                'actual_start_time' => '2019-03-07',
                'actual_end_time' => NULL,
                'description' => 'Review of literature',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Proposal writing',
                'expected_start_time' => '2019-04-04',
                'expected_end_time' => '2019-05-14',
                'actual_start_time' => '2019-04-07',
                'actual_end_time' => NULL,
                'description' => 'Proposal writing',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Questionnaire preparation',
                'expected_start_time' => '2019-05-04',
                'expected_end_time' => '2019-06-19',
                'actual_start_time' => '2019-05-07',
                'actual_end_time' => NULL,
                'description' => 'Questionnaire preparation',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Questionnaire pretesting',
                'expected_start_time' => '2019-06-04',
                'expected_end_time' => '2019-07-21',
                'actual_start_time' => '2019-06-07',
                'actual_end_time' => NULL,
                'description' => 'Questionnaire pretesting',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Data collection',
                'expected_start_time' => '2019-07-04',
                'expected_end_time' => '2019-08-05',
                'actual_start_time' => '2019-07-07',
                'actual_end_time' => NULL,
                'description' => 'Data collection',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Data tabulation',
                'expected_start_time' => '2019-08-04',
                'expected_end_time' => '2019-09-26',
                'actual_start_time' => '2019-08-07',
                'actual_end_time' => NULL,
                'description' => 'Data tabulation',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Report writing',
                'expected_start_time' => '2019-09-04',
                'expected_end_time' => '2019-10-13',
                'actual_start_time' => '2019-09-07',
                'actual_end_time' => NULL,
                'description' => 'Report writing',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Draft report submission',
                'expected_start_time' => '2019-09-25',
                'expected_end_time' => '2019-10-18',
                'actual_start_time' => '2019-09-28',
                'actual_end_time' => NULL,
                'description' => 'Draft report submission',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Incorporating research division comments',
                'expected_start_time' => '2019-10-04',
                'expected_end_time' => '2019-11-21',
                'actual_start_time' => '2019-10-07',
                'actual_end_time' => NULL,
                'description' => 'Incorporating research division comments',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'First final report submission',
                'expected_start_time' => '2019-11-04',
                'expected_end_time' => '2019-12-23',
                'actual_start_time' => '2019-11-07',
                'actual_end_time' => NULL,
                'description' => 'First final report submission',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Received final report',
                'expected_start_time' => '2019-12-04',
                'expected_end_time' => '2020-01-29',
                'actual_start_time' => '2019-12-07',
                'actual_end_time' => NULL,
                'description' => 'Received final report',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Sending external reviewer',
                'expected_start_time' => '2020-01-04',
                'expected_end_time' => '2020-02-26',
                'actual_start_time' => '2020-01-07',
                'actual_end_time' => NULL,
                'description' => 'Sending external reviewer',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Comments from external reviewer',
                'expected_start_time' => '2020-02-04',
                'expected_end_time' => '2020-03-05',
                'actual_start_time' => '2020-02-07',
                'actual_end_time' => NULL,
                'description' => 'Comments from external reviewer',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Send to respective researcher',
                'expected_start_time' => '2020-02-15',
                'expected_end_time' => '2020-03-15',
                'actual_start_time' => '2020-02-27',
                'actual_end_time' => NULL,
                'description' => 'Send to respective researcher',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Accepted final report',
                'expected_start_time' => '2020-03-04',
                'expected_end_time' => '2020-04-20',
                'actual_start_time' => '2020-03-07',
                'actual_end_time' => NULL,
                'description' => 'Accepted final report',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'Send for publication',
                'expected_start_time' => '2020-03-04',
                'expected_end_time' => '2020-04-10',
                'actual_start_time' => '2020-03-17',
                'actual_end_time' => NULL,
                'description' => 'Send for publication',
                'created_at' => '2019-03-25 17:00:20',
                'updated_at' => '2019-03-25 17:00:20',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'taskable_id' => 1,
                'taskable_type' => 'research',
                'name' => 'testing',
                'expected_start_time' => '2019-04-02',
                'expected_end_time' => '2019-04-02',
                'actual_start_time' => '2019-04-12',
                'actual_end_time' => NULL,
                'description' => 'dfgdsgd',
                'created_at' => '2019-04-01 08:45:30',
                'updated_at' => '2019-04-01 08:45:32',
                'deleted_at' => NULL,
            ),
        ));

    }
}