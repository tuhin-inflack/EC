<?php

use Illuminate\Database\Seeder;

class RoomBookingRequestersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('room_booking_requesters')->delete();
        
        \DB::table('room_booking_requesters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'room_booking_id' => 1,
                'first_name' => 'Hasib',
                'middle_name' => NULL,
                'last_name' => 'Noor',
                'gender' => 'male',
                'contact' => '01552445448',
                'address' => 'Dhaka, Bangladesh',
                'email' => NULL,
                'nid' => NULL,
                'organization' => NULL,
                'designation' => NULL,
                'organization_type' => NULL,
                'org_address' => NULL,
                'photo' => NULL,
                'passport_no' => NULL,
                'nid_doc' => NULL,
                'passport_doc' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            1 => 
            array (
                'id' => 2,
                'room_booking_id' => 2,
                'first_name' => 'Sahib',
                'middle_name' => NULL,
                'last_name' => 'Ron',
                'gender' => 'male',
                'contact' => '01875445448',
                'address' => 'Dhaka, Bangladesh',
                'email' => NULL,
                'nid' => NULL,
                'organization' => NULL,
                'designation' => NULL,
                'organization_type' => NULL,
                'org_address' => NULL,
                'photo' => NULL,
                'passport_no' => NULL,
                'nid_doc' => NULL,
                'passport_doc' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            2 => 
            array (
                'id' => 3,
                'room_booking_id' => 3,
                'first_name' => 'Aftab',
                'middle_name' => NULL,
                'last_name' => 'Hossain',
                'gender' => 'male',
                'contact' => '01980445466',
                'address' => 'Dhaka, Bangladesh',
                'email' => NULL,
                'nid' => NULL,
                'organization' => NULL,
                'designation' => NULL,
                'organization_type' => NULL,
                'org_address' => NULL,
                'photo' => NULL,
                'passport_no' => NULL,
                'nid_doc' => NULL,
                'passport_doc' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
            3 => 
            array (
                'id' => 4,
                'room_booking_id' => 4,
                'first_name' => 'Shirin',
                'middle_name' => NULL,
                'last_name' => 'Afroza',
                'gender' => 'female',
                'contact' => '01755658120',
                'address' => 'Dhaka, Bangladesh',
                'email' => NULL,
                'nid' => NULL,
                'organization' => NULL,
                'designation' => NULL,
                'organization_type' => NULL,
                'org_address' => NULL,
                'photo' => NULL,
                'passport_no' => NULL,
                'nid_doc' => NULL,
                'passport_doc' => NULL,
                'created_at' => '2019-02-07 21:30:06',
                'updated_at' => '2019-02-07 21:30:06',
            ),
        ));
        
        
    }
}