<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = ['shortcode', 'name', 'level', 'total_room', 'total_seat'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
