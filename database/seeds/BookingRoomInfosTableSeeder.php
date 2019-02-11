<?php

use Illuminate\Database\Seeder;

class BookingRoomInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_room_infos')->delete();
        
        \DB::table('booking_room_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'room_booking_id' => 1,
                'room_type_id' => 3,
                'quantity' => 2,
                'rate_type' => 'govt',
                'rate' => '607.00',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'room_booking_id' => 2,
                'room_type_id' => 3,
                'quantity' => 2,
                'rate_type' => 'bard-emp',
                'rate' => '731.00',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            2 => 
            array (
                'id' => 3,
                'room_booking_id' => 3,
                'room_type_id' => 2,
                'quantity' => 2,
                'rate_type' => 'special',
                'rate' => '205.00',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            3 => 
            array (
                'id' => 4,
                'room_booking_id' => 4,
                'room_type_id' => 4,
                'quantity' => 1,
                'rate_type' => 'ge',
                'rate' => '703.00',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
        ));
        
        
    }
}