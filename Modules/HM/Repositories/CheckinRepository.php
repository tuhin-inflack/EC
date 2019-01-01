<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 12/31/18
 * Time: 6:16 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\CheckinDetail;

class CheckinRepository extends AbstractBaseRepository
{
    protected $modelName = CheckinDetail::class;

    public function countByRoom($roomId)
    {
        return $this->model->where('room_id', $roomId)->where('checkout_date', null)->count();
    }
}