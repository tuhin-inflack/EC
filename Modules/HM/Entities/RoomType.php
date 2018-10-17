<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['hostel_id', 'name', 'capacity', 'rate'];
}
