<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = ['shortcode', 'name', 'level', 'total_room', 'total_seat'];

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
