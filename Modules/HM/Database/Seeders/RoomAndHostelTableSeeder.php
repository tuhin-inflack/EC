<?php

namespace Modules\HM\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HM\Entities\Hostel;
use Modules\HM\Repositories\RoomRepository;
use Modules\HM\Services\RoomService;

class RoomAndHostelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $roomService = new RoomService(new RoomRepository());

        $data = [];

        $names = [
            "বীরশ্রেষ্ঠ শহীদ মহিউদ্দিন জাহাঙ্গীর",
            "বীরশ্রেষ্ঠ শহীদ হামিদুর রহমান",
            "বীরশ্রেষ্ঠ শহীদ মোস্তফা কামাল",
            "বীরশ্রেষ্ঠ শহীদ মতিউর রহমান",
            "বীরশ্রেষ্ঠ শহীদ মোহাম্মদ রুহুল আমিন",
            "বীরশ্রেষ্ঠ শহীদ মুন্সি আব্দুর রউফ",
            "বীরশ্রেষ্ঠ শহীদ নূর মোহাম্মদ শেখ",
            "তিতাস গেস্ট হাউস",
            "গোমতী গেস্ট হাউস",
            "বনকুঠির"
        ];


        foreach ($names as $count => $name) {
            $prepare = [
                "name" => $name,
                "total_floor" => 3,
            ];

//            $rooms = [];
//
//            for ($i = $prepare['total_floor']; $i > 0; $i--) {
//                $floors = [
//                    "floor" => $i,
//                    "room_type" => rand(1, 4),
//                    "room_numbers" => $i . "" . $count . "1-" . $i . "" . $count . "" . rand(2, 9),
//                ];
//
//                array_push($rooms, $floors);
//            }
//
//            $prepare['rooms'] = $rooms;
//
            array_push($data, $prepare);
        }

        foreach ($data as $item) {

            $hostel = Hostel::create($item);

//            $hostel = Hostel::create(array_except($item, 'rooms'));
//
//            $rooms = $roomService->getRoomsFromRoomEntry($item['rooms']);
//            $hostel->rooms()->saveMany($rooms);
        }
    }
}
