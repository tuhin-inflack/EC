<?php

use Illuminate\Database\Seeder;

class BookingGuestInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_guest_infos')->delete();
        
        \DB::table('booking_guest_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'room_booking_id' => 1,
                'first_name' => 'Hasib',
                'middle_name' => NULL,
                'last_name' => 'Noor',
                'age' => 22,
                'gender' => 'male',
                'relation' => 'friend',
                'nid_no' => NULL,
                'nid_doc' => NULL,
                'address' => 'Dhaka, Bangladesh',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'status' => 'booked',
                'nationality' => 'বাঙালি',
            ),
            1 => 
            array (
                'id' => 2,
                'room_booking_id' => 2,
                'first_name' => 'Sahib',
                'middle_name' => NULL,
                'last_name' => 'Ron',
                'age' => 20,
                'gender' => 'male',
                'relation' => 'friend',
                'nid_no' => NULL,
                'nid_doc' => NULL,
                'address' => 'Dhaka, Bangladesh',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'status' => 'booked',
                'nationality' => 'বাঙালি',
            ),
            2 => 
            array (
                'id' => 3,
                'room_booking_id' => 3,
                'first_name' => 'Aftab',
                'middle_name' => NULL,
                'last_name' => 'Hossain',
                'age' => 24,
                'gender' => 'male',
                'relation' => 'friend',
                'nid_no' => NULL,
                'nid_doc' => NULL,
                'address' => 'Dhaka, Bangladesh',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'status' => 'booked',
                'nationality' => 'বাঙালি',
            ),
            3 => 
            array (
                'id' => 4,
                'room_booking_id' => 4,
                'first_name' => 'Shirin',
                'middle_name' => NULL,
                'last_name' => 'Afroza',
                'age' => 18,
                'gender' => 'female',
                'relation' => 'friend',
                'nid_no' => NULL,
                'nid_doc' => NULL,
                'address' => 'Dhaka, Bangladesh',
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
                'status' => 'booked',
                'nationality' => 'বাঙালি',
            ),
        ));
        
        
    }
}