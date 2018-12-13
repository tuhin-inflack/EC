<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:57 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\RoomBooking;

class RoomBookingRepository extends AbstractBaseRepository
{
    protected $modelName = RoomBooking::class;
}