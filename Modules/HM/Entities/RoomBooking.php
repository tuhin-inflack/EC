<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Employee;

class RoomBooking extends Model
{
    protected $fillable = ['shortcode', 'start_date', 'end_date', 'booking_type', 'status', 'note', 'employee_id'];

    public function requester()
    {
        return $this->hasOne(RoomBookingRequester::class, 'room_booking_id', 'id');
    }

    public function referee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function roomInfos()
    {
        return $this->hasMany(BookingRoomInfo::class, 'room_booking_id', 'id');
    }

    public function guestInfos()
    {
        return $this->hasMany(BookingGuestInfo::class, 'room_booking_id', 'id');
    }
}
