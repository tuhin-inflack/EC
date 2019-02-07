<?php

use Illuminate\Database\Seeder;

class TraineesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trainees')->delete();
        
        \DB::table('trainees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'training_id' => 1,
                'trainee_first_name' => 'মোহাম্মদ',
                'trainee_last_name' => 'আবদুস সাত্তার',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01772271757',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'training_id' => 2,
                'trainee_first_name' => 'মোহাম্মদ',
                'trainee_last_name' => 'জাহাঙ্গীর আলম',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01734486485',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            2 => 
            array (
                'id' => 3,
                'training_id' => 2,
                'trainee_first_name' => 'মোহাম্মদ',
                'trainee_last_name' => 'আবু তালেব',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01755179890',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            3 => 
            array (
                'id' => 4,
                'training_id' => 2,
                'trainee_first_name' => 'ইয়া হাসিব মোহাম্মদ',
                'trainee_last_name' => 'আবু বকর সিদ্দীক',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01744100450',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            4 => 
            array (
                'id' => 5,
                'training_id' => 1,
                'trainee_first_name' => 'মোহাম্মদ',
                'trainee_last_name' => 'সাদমান আহমেদ',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01726522164',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            5 => 
            array (
                'id' => 6,
                'training_id' => 3,
                'trainee_first_name' => 'সাহিব বিন',
                'trainee_last_name' => 'মাহবুব',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01740633615',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            6 => 
            array (
                'id' => 7,
                'training_id' => 3,
                'trainee_first_name' => 'মোহাম্মদ',
                'trainee_last_name' => 'সুমন',
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '01714192551',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
        ));
        
        
    }
}