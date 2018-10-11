<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/9/18
 * Time: 5:09 PM
 */

namespace Modules\HM\Services;


use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\RoomTypeRepository;

class RoomTypeService
{
    private $roomTypeRepository;

    /**
     * RoomTypeService constructor.
     * @param RoomTypeRepository $roomTypeRepository
     */
    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
    }

    public function getAll()
    {
//        return $this->roomTypeRepository->
    }

    public function store(array $data)
    {
        return $this->roomTypeRepository->save($data);
    }

    public function update(RoomType $roomType, array $data)
    {
        return $this->roomTypeRepository->update($roomType, $data);
    }
}