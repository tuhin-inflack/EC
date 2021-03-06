<?php

namespace Modules\HM\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\RoomBookingRepository;


class BookingRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach ($this->generateBookingRequestData() as $item) {
            $this->saveBookingRequest($item);
        }
    }

    /**
     * @param $data
     */
    public function saveBookingRequest($data): void
    {
        $roomBooking = new RoomBookingRepository();

        $roomBooking = $roomBooking->save($data['room_bookings']);

        $roomBooking->requester()->save(new RoomBookingRequester($data['room_booking_requesters']));

        $roomBooking->roomInfos()->saveMany([
            new BookingRoomInfo($this->getRateAndTypeOfRoom())
        ]);

        $roomBooking->guestInfos()->saveMany([
            new BookingGuestInfo($this->getGuest($data['room_booking_requesters']))
        ]);
    }

    private function getRateAndTypeOfRoom(){

        $roomType = RoomType::find(rand(1,4))->toArray();

        $rateTypeName = ['ge','govt', 'bard-emp', 'special'];
        $rateTypeIndex = [
            'ge' => 'general_rate',
            'govt' => 'govt_rate',
            'bard-emp' => 'bard_emp_rate',
            'special' => 'special_rate'
        ];

        $rateType = $rateTypeName[rand(0,3)];

        return [
            'room_type_id' => $roomType['id'],
            'quantity' => rand(1,2),
            'rate_type' => $rateType,
            'rate' => $roomType[$rateTypeIndex[$rateType]]
        ];
    }

    private function getGuest($data){
        return [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'age' => rand(18, 25),
            'gender' => $data['gender'],
            'relation' => "friend",
            'nid_doc' => null,
            'address' => $data['address']
        ];
    }

    /**
     * @return array $data
     */
    public function generateBookingRequestData()
    {
        return [
            [
                'room_bookings' => [
                    "start_date" => Carbon::now(),
                    "end_date" => Carbon::now()->addDays(rand(1, 7)),
                    "shortcode" => time(),
                    "booking_type" => "general",
                    "status" => "pending",
                    "employee_id" => 1,
                    "type" =>"booking",
                    "comment" => "No Comment !!",
                ],
                'room_booking_requesters' => [
                    "first_name" => "Hasib",
                    "last_name" => "Noor",
                    "gender" => "male",
                    "contact" => "01552445448",
                    "address" => "Dhaka, Bangladesh",
                ]
            ],
            [

                'room_bookings' => [
                    "start_date" => Carbon::now(),
                    "end_date" => Carbon::now()->addDays(rand(1, 7)),
                    "shortcode" => time() + 2,
                    "booking_type" => "general",
                    "status" => "pending",
                    "employee_id" => 2,
                    "type" =>"booking",
                    "comment" => "No Comment !!",
                ],
                'room_booking_requesters' => [
                    "first_name" => "Sahib",
                    "last_name" => "Ron",
                    "gender" => "male",
                    "contact" => "01875445448",
                    "address" => "Dhaka, Bangladesh",
                ],
            ]
        ];
    }
}
