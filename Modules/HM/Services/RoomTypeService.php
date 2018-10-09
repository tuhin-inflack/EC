<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/9/18
 * Time: 5:09 PM
 */

namespace Modules\HM\Services;


use Modules\HM\Repositories\RoomTypeRepository;

class RoomTypeService
{
    protected $roomTypeRepository;

    /**
     * RoomTypeService constructor.
     */
    public function __construct()
    {
        $this->roomTypeRepository = new RoomTypeRepository();
    }

    public function store(array $data)
    {
        return $this->roomTypeRepository->save($data);
    }
}