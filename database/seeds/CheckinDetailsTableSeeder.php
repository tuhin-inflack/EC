<?php

use Illuminate\Database\Seeder;

class CheckinDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('checkin_details')->delete();
        
        \DB::table('checkin_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'checkin_id' => 3,
                'booking_guest_info_id' => 3,
                'room_id' => 1,
                'checkin_date' => '2019-02-07 21:30:06',
                'checkout_date' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'checkin_id' => 4,
                'booking_guest_info_id' => 4,
                'room_id' => 2,
                'checkin_date' => '2019-02-07 21:30:06',
                'checkout_date' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
        ));
        
        
    }
}