<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class BookingGuestInfo extends Model
{
    protected $fillable = [
        'room_booking_id',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender',
        'address',
        'relation',
        'nid_no',
        'nid_doc',
        'status',
        'nationality'
    ];
}
