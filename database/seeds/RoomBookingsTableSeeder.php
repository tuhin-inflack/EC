<?php

use Illuminate\Database\Seeder;

class RoomBookingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_bookings')->delete();
        
        \DB::table('room_bookings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-14',
                'actual_end_date' => NULL,
                'shortcode' => '1549553406',
                'booking_type' => 'general',
                'status' => 'pending',
                'note' => NULL,
                'employee_id' => 1,
                'type' => 'booking',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'training_id' => NULL,
                'comment' => 'No Comment !!',
            ),
            1 => 
            array (
                'id' => 2,
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-11',
                'actual_end_date' => NULL,
                'shortcode' => '1549553408',
                'booking_type' => 'general',
                'status' => 'pending',
                'note' => NULL,
                'employee_id' => 2,
                'type' => 'booking',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'training_id' => NULL,
                'comment' => 'No Comment !!',
            ),
            2 => 
            array (
                'id' => 3,
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-14',
                'actual_end_date' => NULL,
                'shortcode' => '1549553406',
                'booking_type' => 'general',
                'status' => 'approved',
                'note' => NULL,
                'employee_id' => 1,
                'type' => 'checkin',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'training_id' => NULL,
                'comment' => 'No Comment !!',
            ),
            3 => 
            array (
                'id' => 4,
                'start_date' => '2019-02-07',
                'end_date' => '2019-02-11',
                'actual_end_date' => NULL,
                'shortcode' => '1549553408',
                'booking_type' => 'general',
                'status' => 'approved',
                'note' => NULL,
                'employee_id' => 2,
                'type' => 'checkin',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'training_id' => NULL,
                'comment' => 'No Comment !!',
            ),
        ));
        
        
    }
}