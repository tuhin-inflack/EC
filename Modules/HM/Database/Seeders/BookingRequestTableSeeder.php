<?php

namespace Modules\HM\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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

        $roomBooking = $roomBooking->save($data);

        $roomBooking->requester()->save(new RoomBookingRequester($data));

        $roomBooking->roomInfos()->saveMany([
            new BookingRoomInfo($this->getRateAndTypeOfRoom())
        ]);

        $roomBooking->guestInfos()->saveMany([
            new BookingGuestInfo($this->getGuest($data))
        ]);
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
            'gender' => $data['male'],
            'relation' => "Self",
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
                "start_date" => date('Y-m-d'),
                "end_date" => date('Y-') . date('m-') . (date('d') + rand(1, 5)),
                "shortcode" => time(),
                "booking_type" => "general",
                "status" => "pending",
                "type" =>"booking",
                "first_name" => "Hasib",
                "last_name" => "Noor",
                "gender" => "male",
                "contact" => "01552445448",
                "address" => "Dhaka, Bangladesh",
                "comment" => "No Comment !!"
            ],
            [
                "start_date" => date('Y-m-d'),
                "end_date" => date('Y-') . date('m-') . (date('d') + rand(1, 5)),
                "shortcode" => time() + 2,
                "booking_type" => "general",
                "status" => "pending",
                "type" =>"booking",
                "first_name" => "Sahib",
                "last_name" => "Ron",
                "gender" => "male",
                "contact" => "01875445448",
                "address" => "Dhaka, Bangladesh",
                "comment" => "No Comment !!"
            ]
        ];
    }
}
