<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/24/18
 * Time: 3:59 PM
 */

namespace Modules\HM\Services;


use Modules\HM\Entities\Room;
use Modules\HM\Entities\RoomInventory;
use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\RoomRepository;

class RoomService
{
    /**
     * @var RoomRepository
     */
    private $roomRepository;

    /**
     * RoomService constructor.
     * @param RoomRepository $roomRepository
     */
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAll()
    {
        return $this->roomRepository->findAll();
    }

    public function store(array $data)
    {
        $room = $this->roomRepository->save($data);
        $inventoryCollection = collect($data['inventories']);
        $roomInventories = $inventoryCollection->map(function($inventory) {
           return new RoomInventory($inventory);
        });

        return $room->inventories()->saveMany($roomInventories);
    }

    public function update(Room $room, array $data)
    {
        $roomInventoryCollection = collect($data['inventories']);
        $roomInventoryCollection->map(function ($roomInventory) use ($room) {
            $room->inventories()
                ->updateOrCreate(['id' => $roomInventory['id']],
                    array_merge($roomInventory, ['room_id' => $room->id]));
        });

        return $this->roomRepository->update($room, $data);
    }

    public function delete(Room $room)
    {
        $room->inventories()->delete();
        return $this->roomRepository->delete($room);
    }

    public function getRoomsFromRoomEntry($roomDetails)
    {
        $rooms = [];
        foreach ($roomDetails as $item) {
            $roomData = $this->processRoomNumberInput($item['room_numbers']);
            if ($roomData['isValid']) {
                foreach ($roomData['roomNumbers'] as $number) {
                    array_push($rooms, new Room(['floor'=>$item['floor'], 'room_type_id' => $item['room_type'], 'room_number' => $number]));
                }
            }
        }

        return $rooms;
    }

    private function processRoomNumberInput($roomNumberInput)
    {
        $roomNumbersArr = explode(',', $roomNumberInput);
        $roomNumbers = [];
        $dupErrMsg = 'Can not add same room number twice';
        $validationMessage = '';
        $valid = 1;
        foreach ($roomNumbersArr as $item) {
            if (strpos($item, '-') !== false) {
                $index = explode('-', $item);
                for ($i = $index[0]; $i <= $index[1]; $i++) {
                    array_push($roomNumbers, (integer)$i);
                }
            } else {
                array_push($roomNumbers, (integer)$item);
            }
        }

        //Check for duplicate model machine numbers
        if (count(array_unique($roomNumbers)) < count($roomNumbers)) {
            $valid = 0;
            $validationMessage = $dupErrMsg;
        }

        return ['isValid' => $valid, 'roomNumbers' => $roomNumbers, 'errorMsg' => $validationMessage];
    }
}
