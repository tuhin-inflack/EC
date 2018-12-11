<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomBookingReferee extends Model
{
    protected $fillable = ['room_booking_id', 'name', 'department', 'contact'];
}
