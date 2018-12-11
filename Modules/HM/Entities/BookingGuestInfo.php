<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class BookingGuestInfo extends Model
{
    protected $fillable = ['room_booking_id', 'name', 'age', 'gender', 'address', 'relation', 'nid_no', 'nid_doc'];
}
