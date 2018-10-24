<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['hostel_id', 'room_type_id', 'shortcode', 'level'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function inventories()
    {
        return $this->hasMany(RoomInventory::class);
    }
}
