<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:57 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\RoomBooking;

class RoomBookingRepository extends AbstractBaseRepository
{
    protected $modelName = RoomBooking::class;

    public function pluckTrainingTitleBookingId()
    {
        return $this->model->leftjoin('trainings', 'room_bookings.training_id', '=', 'trainings.id')
            ->where('room_bookings.booking_type', 'training')
            ->where('room_bookings.type', 'booking')
            ->where('room_bookings.status', 'approved')
            ->whereNotNull('room_bookings.training_id')
            ->pluck('trainings.training_title', 'room_bookings.id');
    }

    public function getApprovedBookingRequest($roomBooking)
    {
        return $this->model->whereDate('end_date', '>', $roomBooking->start_date)
            ->where('room_bookings.id', '!=', $roomBooking->id)
            ->where('room_bookings.status', 'approved')
            ->join('booking_checkin', 'booking_checkin.booking_id', '!=', 'room_bookings.id')
            ->select('room_bookings.*')
            ->get();
    }
}