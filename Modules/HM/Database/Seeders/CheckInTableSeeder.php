<?php

namespace Modules\HM\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\CheckinRoom;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\RoomBookingRepository;
use Modules\HM\Repositories\RoomRepository;
use Modules\HM\Services\RoomService;

class CheckInTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        foreach ($this->generateCheckInData() as $item) {
            $this->saveCheckIn($item);
        }
    }

    /**
     * @param $data
     */
    private function saveCheckIn($data): void
    {
        $roomBooking = new RoomBookingRepository();

        $roomBooking = $roomBooking->save($data['room_bookings']);

        $this->saveRoomNumbers($roomBooking, $data['room_numbers']);

        $roomBooking->requester()->save(new RoomBookingRequester($data['room_booking_requesters']));

        $roomBooking->roomInfos()->saveMany([
            new BookingRoomInfo($this->getRateAndTypeOfRoom())
        ]);

        $roomBooking->guestInfos()->saveMany([
            new BookingGuestInfo($this->getGuest($data['room_booking_requesters']))
        ]);
    }

    private function saveRoomNumbers($checkin, $rooms)
    {
        $roomArr = explode(',', $rooms);
        $roomRepository = new RoomRepository();

        foreach ($roomArr as $room) {
            CheckinRoom::create([
                'checkin_id' => $checkin->id, 'room_id' => $room
            ]);

            $room = $roomRepository->findOne($room);
            $room->update(['status' => 'unavailable']);
        }
    }

    private function getRateAndTypeOfRoom(){

        $roomType = RoomType::find(rand(1,4))->toArray();

        $rateTypeName = ['ge','govt', 'bard-emp', 'special'];
        $rateTypeIndex = ['ge' => 'general_rate' ,'govt' => 'govt_rate', 'bard-emp' => 'bard_emp_rate', 'special' => 'special_rate'];

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
    public function generateCheckInData()
    {
        return [
            [
                'room_bookings' => [
                    "start_date" => Carbon::now(),
                    "end_date" => Carbon::now()->addDays(rand(1, 7)),
                    "shortcode" => time(),
                    "booking_type" => "general",
                    "status" => "approved",
                    "employee_id" => 1,
                    "type" =>"checkin",
                    "comment" => "No Comment !!",
                    "assigned_to" => 2
                ],
                'room_numbers' => "1",
                'room_booking_requesters' => [
                    "first_name" => "Aftab",
                    "last_name" => "Hossain",
                    "gender" => "male",
                    "contact" => "01980445466",
                    "address" => "Dhaka, Bangladesh",
                ]
            ],
            [
                'room_bookings' => [
                    "start_date" => Carbon::now(),
                    "end_date" => Carbon::now()->addDays(rand(1, 7)),
                    "shortcode" => time() + 2,
                    "booking_type" => "general",
                    "status" => "approved",
                    "employee_id" => 2,
                    "type" =>"checkin",
                    "comment" => "No Comment !!",
                    "assigned_to" => 2
                ],
                'room_numbers' => "2",
                'room_booking_requesters' => [
                    "first_name" => "Shirin",
                    "last_name" => "Afroza",
                    "gender" => "female",
                    "contact" => "01755658120",
                    "address" => "Dhaka, Bangladesh",
                ],
            ]
        ];
    }
}
