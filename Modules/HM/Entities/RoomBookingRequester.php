<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomBookingRequester extends Model
{
    protected $fillable = ['room_booking_id', 'name', 'gender', 'contact', 'email', 'nid', 'passport_no', 'organization', 'designation', 'organization_type', 'photo', 'nid_doc', 'passport_doc'];
}
