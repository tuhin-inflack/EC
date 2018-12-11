<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/24/18
 * Time: 3:59 PM
 */

namespace Modules\HM\Services;


use Illuminate\Validation\ValidationException;
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
        $roomData = $this->processRoomNumberInput($data['room_numbers']);
        if ($roomData['isValid']) {
            $rooms = $this->generateRooms($roomData['roomNumbers'], $data['floor'], $data['room_type_id'], $data['hostel_id']);
            foreach ($rooms as $room) {
                $room->save();
            }
        } else {
            throw ValidationException::withMessages(['room_numbers'=>'Invalid room number entry']);
        }

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
                array_push($rooms, $this->generateRooms($roomData['roomNumbers'],
                    $item['floor'], $item['room_type']));
            }
        }

        return $rooms;
    }

    private function generateRooms(array $roomNumbers, $floor, $roomTypeId, $hostelId = null)
    {
        $rooms = [];
        foreach ($roomNumbers as $number) {
            array_push($rooms, $this->getRoom($floor, $roomTypeId, $number, $hostelId));
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

    private function getRoom($floor, $roomTypeId, $number, $hostelId = null)
    {
        if ($hostelId)
            return new Room(['floor' => $floor, 'room_type_id' => $roomTypeId, 'room_number' => $number, 'hostel_id' => $hostelId]);
        else
            return new Room(['floor' => $floor, 'room_type_id' => $roomTypeId, 'room_number' => $number]);
    }
}
