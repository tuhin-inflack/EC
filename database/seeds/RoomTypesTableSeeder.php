<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_types')->delete();
        
        \DB::table('room_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'এসি অভিজাত',
                'capacity' => 1,
                'general_rate' => '546.00',
                'govt_rate' => '507.00',
                'bard_emp_rate' => '453.00',
                'special_rate' => '412.00',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'এসি শোভন',
                'capacity' => 2,
                'general_rate' => '1183.00',
                'govt_rate' => '867.00',
                'bard_emp_rate' => '728.00',
                'special_rate' => '205.00',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'শোভন',
                'capacity' => 3,
                'general_rate' => '676.00',
                'govt_rate' => '607.00',
                'bard_emp_rate' => '731.00',
                'special_rate' => '138.00',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'সাধারণ',
                'capacity' => 4,
                'general_rate' => '703.00',
                'govt_rate' => '536.00',
                'bard_emp_rate' => '422.00',
                'special_rate' => '704.00',
                'created_at' => '2019-02-07 21:30:05',
                'updated_at' => '2019-02-07 21:30:05',
            ),
        ));
        
        
    }
}