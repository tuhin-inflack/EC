<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ['hostel_id', 'room_type_id', 'room_number', 'floor'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function inventories()
    {
        return $this->hasMany(RoomInventory::class);
    }
}
