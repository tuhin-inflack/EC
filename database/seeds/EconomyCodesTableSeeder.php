<?php

use Illuminate\Database\Seeder;

class EconomyCodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('economy_codes')->delete();
        
        \DB::table('economy_codes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '3211101',
                'english_name' => 'Awards and rewards',
                'bangla_name' => 'পুরস্কার',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:49:25',
                'updated_at' => '2019-02-27 15:49:25',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '3211102',
                'english_name' => 'Cleaning and washing',
                'bangla_name' => 'পরিস্কার পরিচ্ছনতা',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:49:48',
                'updated_at' => '2019-02-27 15:49:48',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '3211107',
                'english_name' => 'Hiring charge',
                'bangla_name' => 'হায়ারিং চার্জ',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:50:07',
                'updated_at' => '2019-02-27 15:50:07',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '3211114',
                'english_name' => 'Utility service charge',
                'bangla_name' => 'ইউটিলিটি সার্ভিস চার্জ',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:50:35',
                'updated_at' => '2019-02-27 15:50:35',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '3111101',
                'english_name' => 'Basic pay',
                'bangla_name' => 'মূল বেতন',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:51:04',
                'updated_at' => '2019-02-27 15:51:04',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '3111202',
                'english_name' => 'Personal pay',
                'bangla_name' => 'ব্যক্তিগত  বেতন',
                'description' => NULL,
                'visible' => 0,
                'created_at' => '2019-02-27 15:51:32',
                'updated_at' => '2019-02-27 15:51:32',
            ),
        ));
        
        
    }
}