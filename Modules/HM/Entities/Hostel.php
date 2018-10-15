<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = ['shortcode', 'name', 'total_room', 'total_seat'];
}
