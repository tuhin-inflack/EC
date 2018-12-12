<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/24/18
 * Time: 3:58 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\Room;

class RoomRepository extends AbstractBaseRepository
{
    protected $modelName = Room::class;

    public function saveAll($rooms)
    {
        //TODO: Need to update the implementation for saving multiple items
        foreach ($rooms as $room) {
            $room->save();
        }
    }
}
