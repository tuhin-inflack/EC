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
use Modules\HM\Entities\RoomType;
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
            $hostelDetails[$hostel->name] =['hostelDetails' => $hostel, 'roomDetails' =>$roomDetails];
        }
        return $hostelDetails;
    }
}
