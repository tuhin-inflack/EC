<?php

use Illuminate\Database\Seeder;

class CheckinRoomTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('checkin_room')->delete();
        
        \DB::table('checkin_room')->insert(array (
            0 => 
            array (
                'id' => 1,
                'checkin_id' => 3,
                'room_id' => 1,
                'status' => 'checkedin',
                'checkin_date' => '2019-02-07 21:28:52',
                'checkout_date' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'checkin_id' => 4,
                'room_id' => 2,
                'status' => 'checkedin',
                'checkin_date' => '2019-02-07 21:28:52',
                'checkout_date' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
        ));
        
        
    }
}