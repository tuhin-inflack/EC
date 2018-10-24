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

    public function delete(Room $room)
    {
        return $this->roomRepository->delete($room);
    }
}