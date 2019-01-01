<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/1/19
 * Time: 2:46 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\RoomBookingRequester;

class RoomBookingRequesterRepository extends AbstractBaseRepository
{
    protected $modelName = RoomBookingRequester::class;

    public function pluckContactBookingId()
    {
        return $this->model->whereHas('roomBooking', function($query) {
                $query->where('status', 'approved');
            })->pluck('contact', 'room_booking_id');
    }
}
