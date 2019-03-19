<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraineesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('trainees')->delete();
        
        DB::table('trainees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'training_id' => 1,
                'bangla_name' => 'মোহাম্মদ আবদুস সাত্তার',
                'english_name' => 'Mohammed Abdus Sattar',
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
                'bangla_name' => 'মোহাম্মদ জাহাঙ্গীর আলম',
                'english_name' => 'Mohanned Jahangir Alam',
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
                'bangla_name' => 'মোহাম্মদ আবু তালেব',
                'english_name' => 'Mohanned Abu Taleb',
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
                'bangla_name' => 'ইয়া হাসিব মোহাম্মদ',
                'english_name' => 'Yah Hasib Mohammed',
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
                'bangla_name' => 'মোহাম্মদ সাদমান আহমেদ',
                'english_name' => 'Mohammed Sadman Ahmed',
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
                'bangla_name' => 'সাহিব বিন মাহবুব',
                'english_name' => 'Sahib Bin Mahbub',
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
                'bangla_name' => 'মোহাম্মদ সুমন',
                'english_name' => 'Mohammed Suman',
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