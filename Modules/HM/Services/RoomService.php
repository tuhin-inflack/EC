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
}