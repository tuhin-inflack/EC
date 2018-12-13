<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $fillable = ['shortcode', 'start_date', 'end_date', 'booking_type', 'status'];

    public function requester()
    {
        return $this->hasOne(RoomBookingRequester::class, 'room_booking_id', 'id');
    }

    public function referee()
    {
        return $this->hasOne(RoomBookingReferee::class, 'room_booking_id', 'id');
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
