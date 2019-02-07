<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trainings')->delete();
        
        \DB::table('trainings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'training_id' => 'BARD-TRN-2019-02-0690984',
                'training_title' => 'কীটনাশক ব্যবহার প্রশিক্ষণ',
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-12',
                'no_of_trainee' => 4,
                'status' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'training_id' => 'BARD-TRN-2019-02-0653866',
                'training_title' => 'সম্পদ ব্যবস্থাপনা প্রশিক্ষণ',
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-12',
                'no_of_trainee' => 5,
                'status' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'training_id' => 'BARD-TRN-2019-02-0611350',
                'training_title' => 'বার্ষিক হিসাবরক্ষণ প্রশিক্ষণ',
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-12',
                'no_of_trainee' => 5,
                'status' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'training_id' => 'BARD-TRN-2019-02-0658378',
                'training_title' => 'মানব সম্পদ উন্নয়ন প্রশিক্ষণ',
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-12',
                'no_of_trainee' => 2,
                'status' => 1,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}