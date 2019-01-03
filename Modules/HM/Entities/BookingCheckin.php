<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/3/19
 * Time: 11:54 AM
 */

namespace Modules\HM\Entities;


use Illuminate\Database\Eloquent\Model;

class BookingCheckin extends Model
{
    protected $table = 'booking_checkin';

    protected $fillable = ['id', 'booking_id', 'checkin_id'];
}
