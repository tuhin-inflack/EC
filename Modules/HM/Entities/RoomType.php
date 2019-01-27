<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name', 'capacity', 'general_rate', 'govt_rate', 'bard_emp_rate', 'special_rate'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id', 'id');
    }
}
