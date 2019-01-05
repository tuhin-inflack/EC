<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/11/18
 * Time: 6:43 PM
 */

namespace Modules\HM\Services;

use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\HM\Entities\Hostel;
use Modules\HM\Repositories\HostelRepository;

class HostelService
{
    use CrudTrait;

    private $hostelRepository;
    private $roomService;

    /**
     * HostelService constructor.
     * @param HostelRepository $hostelRepository
     * @param RoomService $roomService
     */
    public function __construct(HostelRepository $hostelRepository, RoomService $roomService)
    {
        $this->hostelRepository = $hostelRepository;
        $this->roomService = $roomService;
        $this->setActionRepository($this->hostelRepository);
    }

    public function getAll()
    {
        return $this->hostelRepository->findAll();
    }

    public function store(array $data)
    {
        $hostel = $this->save($data);
        if (isset($data['rooms']) && !empty($data['rooms'])) {
            $rooms = $this->roomService->getRoomsFromRoomEntry($data['rooms']);
            $hostel->rooms()->saveMany($rooms);
        }
    }

    public function destroy(Hostel $hostel)
    {
        DB::transaction(function () use ($hostel) {
            $hostel->rooms()->delete();
            $hostel->delete();
        });
    }

    public function groupHostelRoomsByType($rooms)
    {
        $roomList = [];
        foreach ($rooms as $room) {
            if (!array_key_exists($room->roomType->name, $roomList)) {
                $roomList[$room->roomType->name] = [$room];
            } else {
                array_push($roomList[$room->roomType->name], $room);
            }
        }

        return $roomList;
    }

    public function getHostelAndRoomDetails()
    {
        $hostelDetails = [];
        $hostels = $this->findAll();
        foreach ($hostels as $hostel) {
            $roomDetails = $this->roomService->getRoomCountByRoomType($hostel->id);
            $hostelDetails[$hostel->name] = ['hostelDetails' => $hostel, 'roomDetails' => $roomDetails];
        }
        return $hostelDetails;
    }

    public function getHostelByBookedRooms($hostelIds)
    {
        $hostelDetails = [];
        $hostels = $this->getHostelByIds($hostelIds);
        foreach ($hostels as $hostel) {
            $roomDetails = $this->roomService->getRoomCountByRoomType($hostel->id);
            $hostelDetails[$hostel->name] = ['hostelDetails' => $hostel, 'roomDetails' => $roomDetails];
        }
        return $hostelDetails;
    }

    public function getHostelByIds($hostelIds)
    {
        $hostels = $this->hostelRepository->findIn('id', $hostelIds);
        return $hostels;
    }

    public function getHostelByWithRooms($hostelIds, $roomIds)
    {
        $hostels = $this->hostelRepository->getHostelsWithSelectedRooms($hostelIds, $roomIds);
        return $hostels;
    }

    public function getRoomsCountBasedOnStatus($hostelId = null)
    {
        $overAllStatus = [
            'booked' => 0,
            'available' => 0,
            'partially_available' => 0,
            'not_in_service' => 0
        ];

        $allRoomsCount = $this->roomService->getRoomCountByStatus($hostelId)->toArray();
        $allRoomsCount = array_column($allRoomsCount, 'room_count', 'status');

        $overAllStatus['available'] = (isset($allRoomsCount['available']) ? $allRoomsCount['available'] : 0);
        $overAllStatus['partially-available'] = (isset($allRoomsCount['partially-available']) ? $allRoomsCount['partially-available'] : 0);
        $overAllStatus['booked'] = (isset($allRoomsCount['unavailable']) ? $allRoomsCount['unavailable'] : 0);
        $overAllStatus['not_in_service'] = (isset($allRoomsCount['not-in-service']) ? $allRoomsCount['not-in-service'] : 0);

        return $overAllStatus;
    }


}
