<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/24/18
 * Time: 3:59 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Illuminate\Validation\ValidationException;
use Modules\HM\Entities\Hostel;
use Modules\HM\Entities\Room;
use Modules\HM\Repositories\RoomRepository;

class RoomService
{
    use CrudTrait;
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
        $this->setActionRepository($this->roomRepository);
    }

    public function getAll()
    {
        return $this->roomRepository->findAll();
    }

    public function store(array $data)
    {
        $roomData = $this->processRoomNumberInput($data['room_numbers'], $data['hostel_id']);
        if ($roomData['isValid']) {
            $rooms = $this->generateRooms($roomData['roomNumbers'], $data['floor'], $data['room_type_id'], $data['hostel_id']);
            $this->roomRepository->saveAll($rooms);
        } else {
            throw ValidationException::withMessages(['room_numbers' => $roomData['errorMsg']]);
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

    public function getRoomsFromRoomEntry($roomDetails)
    {
        $rooms = [];
        foreach ($roomDetails as $item) {
            $roomData = $this->processRoomNumberInput($item['room_numbers']);
            if ($roomData['isValid']) {
                $rooms = array_merge($rooms, $this->generateRooms($roomData['roomNumbers'],
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

    private function processRoomNumberInput($roomNumberInput, $hostelId = null)
    {
        $roomNumbersArr = explode(',', $roomNumberInput);
        $roomNumbers = [];
        $dupErrMsg = trans('hm::hostel.dup_room_err');
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
        if ((count(array_unique($roomNumbers)) < count($roomNumbers)) || ($hostelId && $this->hasRoomAlreadyExist($roomNumbers, $hostelId))) {
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

    private function hasRoomAlreadyExist(array $roomNumbers, $hostelId)
    {
        return $this->roomRepository->exists($roomNumbers, $hostelId);
    }

    public function getRoomsByHostel($hostelId)
    {
        return $this->roomRepository->findBy(['hostel_id' => $hostelId]);
    }

    static function cmp($a, $b)
    {
        if ($a->room_number == $b->room_number) {
            return 0;
        }
        return ($a > $b) ? +1 : -1;
    }

    public function sortRoomsByLevel($rooms)
    {
        $roomDetails = [];
        foreach ($rooms as $room) {
            if (array_key_exists($room->floor, $roomDetails)) {
                array_push($roomDetails[$room->floor], $room);
            } else {
                $roomDetails[$room->floor] = [$room];
            }
        }

        krsort($roomDetails);
        foreach ($roomDetails as $roomDetail) {
            usort($roomDetail, function ($a, $b) {
                return strcmp($a->room_number, $b->room_number);
            });
        }
        return $roomDetails;
    }

    public function getRoomCountByRoomType($hostelId = null)
    {
        return $this->roomRepository->getRoomCountByRoomType($hostelId);
    }

    public function getAllRoomCountByRoomType()
    {
        return $this->roomRepository->getRoomCountByRoomType();
    }

    public function getRoomCountByStatus($hostelId = null)
    {
        return $this->roomRepository->getRoomCountByStatus($hostelId);
    }

    public function getAllRoomCountByStatus()
    {
        return $this->roomRepository->getRoomCountByStatus();
    }

    public function updateStatus(Room $room, $status)
    {
        return $this->roomRepository->update($room, ['status' => $status]);
    }

    public function getAvailableRoomsOfHostel(Hostel $hostel)
    {
        return $hostel->rooms->filter(function ($room) {
            return $room->status == 'available';
        });
    }
}
