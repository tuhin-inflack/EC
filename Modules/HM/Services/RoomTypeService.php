<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/9/18
 * Time: 5:09 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Illuminate\Validation\ValidationException;
use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\RoomTypeRepository;

class RoomTypeService
{
    use CrudTrait;
    private $roomTypeRepository;

    /**
     * RoomTypeService constructor.
     * @param RoomTypeRepository $roomTypeRepository
     */
    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
        $this->setActionRepository($this->roomTypeRepository);
    }

    public function destroy(RoomType $roomType)
    {
        if ($roomType->rooms()) {
            throw ValidationException::withMessages([trans('hm::roomtype.delete_vald')]);
        } else {
            $roomType->delete();
        }
    }

    public function pluck()
    {
        return $this->roomTypeRepository->pluck();
    }
}
