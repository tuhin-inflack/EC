<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/5/19
 * Time: 5:01 PM
 */

namespace Modules\HM\Entities;


use Illuminate\Database\Eloquent\Model;

class CheckinRoom extends Model
{
    protected $table = 'checkin_room';

    protected $fillable = ['checkin_id', 'room_id', 'status', 'checkin_date', 'checkout_date'];

    public function checkin()
    {
        return $this->hasOne(RoomBooking::class, 'id', 'checkin_id');
    }

    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

}
