<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:57 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Illuminate\Support\Facades\DB;
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

    public function getApprovedBookingCheckinRecords($roomBooking)
    {
        $approvedBookingCheckinRecords = $this->model
            ->whereDate('end_date', '>=', $roomBooking->start_date)
            ->whereDate('room_bookings.start_date', '<=', $roomBooking->end_date)
            ->where('room_bookings.id', '!=', $roomBooking->id)
            ->where('room_bookings.status', 'approved')
            ->whereNull('room_bookings.actual_end_date')
            ->get();

        $bookingToCheckinRecords = DB::table('booking_checkin')
            ->pluck('booking_id')
            ->toArray();

        return $approvedBookingCheckinRecords->filter(function ($bookingCheckin) use ($bookingToCheckinRecords) {
            return !in_array($bookingCheckin->id, $bookingToCheckinRecords);
        });

    }
}