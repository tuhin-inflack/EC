<?php

use Illuminate\Database\Seeder;

class RemarksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('remarks')->delete();
        
        \DB::table('remarks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'feature_id' => 2,
                'ref_table_id' => 1,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'Approved by FD',
                'created_at' => '2019-02-07 21:43:54',
                'updated_at' => '2019-02-07 21:43:54',
            ),
            1 => 
            array (
                'id' => 2,
                'feature_id' => 2,
                'ref_table_id' => 1,
                'from_user_id' => 8,
                'from_user_designation' => NULL,
                'remarks' => 'Approved by FD',
                'created_at' => '2019-02-07 21:44:16',
                'updated_at' => '2019-02-07 21:44:16',
            ),
            2 => 
            array (
                'id' => 3,
                'feature_id' => 2,
                'ref_table_id' => 2,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'Please edit',
                'created_at' => '2019-02-07 21:45:25',
                'updated_at' => '2019-02-07 21:45:25',
            ),
            3 => 
            array (
                'id' => 4,
                'feature_id' => 2,
                'ref_table_id' => 2,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'please revise this',
                'created_at' => '2019-02-07 21:46:11',
                'updated_at' => '2019-02-07 21:46:11',
            ),
            4 => 
            array (
                'id' => 5,
                'feature_id' => 2,
                'ref_table_id' => 2,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'Forward to PD',
                'created_at' => '2019-02-07 21:47:14',
                'updated_at' => '2019-02-07 21:47:14',
            ),
            5 => 
            array (
                'id' => 6,
                'feature_id' => 1,
                'ref_table_id' => 1,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'Please correct this',
                'created_at' => '2019-02-07 22:05:41',
                'updated_at' => '2019-02-07 22:05:41',
            ),
            6 => 
            array (
                'id' => 7,
                'feature_id' => 1,
                'ref_table_id' => 2,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'approved by FD',
                'created_at' => '2019-02-07 22:06:46',
                'updated_at' => '2019-02-07 22:06:46',
            ),
            7 => 
            array (
                'id' => 8,
                'feature_id' => 1,
                'ref_table_id' => 2,
                'from_user_id' => 7,
                'from_user_designation' => NULL,
                'remarks' => 'approve for APC',
                'created_at' => '2019-02-07 22:07:14',
                'updated_at' => '2019-02-07 22:07:14',
            ),
            8 => 
            array (
                'id' => 9,
                'feature_id' => 1,
                'ref_table_id' => 1,
                'from_user_id' => 6,
                'from_user_designation' => NULL,
                'remarks' => 'review this',
                'created_at' => '2019-02-07 22:08:03',
                'updated_at' => '2019-02-07 22:08:03',
            ),
        ));
        
        
    }
}