<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/11/18
 * Time: 6:43 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
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
    }

    public function getAll()
    {
        return $this->hostelRepository->findAll();
    }

    public function store(array $data)
    {

        if (isset($data['rooms']) && !empty($data['rooms'])) {
            $rooms = $this->roomService->getRoomsFromRoomEntry($data['rooms']);
            $hostel = $this->hostelRepository->save($data);
            $hostel->rooms()->saveMany($rooms);
        }
    }

    public function update(Hostel $hostel, array $data)
    {
        $roomTypeCollection = collect($data['room_types']);
        $roomTypeCollection->map(function ($roomType) use ($hostel) {
            $hostel->roomTypes()
                ->updateOrCreate(['id' => $roomType['id']],
                    array_merge($roomType, ['hostel_id' => $hostel->id]));
        });

        return $this->hostelRepository->update($hostel, $data);
    }

    public function delete(Hostel $hostel)
    {
        return $this->hostelRepository->delete($hostel);
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
}
