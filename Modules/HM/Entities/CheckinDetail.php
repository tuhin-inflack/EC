<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 12/31/18
 * Time: 11:22 AM
 */

namespace Modules\HM\Entities;


use Illuminate\Database\Eloquent\Model;

class CheckinDetail extends Model
{
    protected $table = 'checkin_details';

    protected $fillable = ['room_booking_id', 'booking_guest_info_id', 'room_id', 'checkin_date', 'checkout_date'];

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function roomBooking()
    {
        return $this->hasOne(RoomBooking::class);
    }

    public function bookingGuest()
    {
        return $this->hasOne(BookingGuestInfo::class);
    }
}