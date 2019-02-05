<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 2/4/19
 * Time: 12:39 PM
 */

namespace App\Repositories\Notification;


use App\Entities\Notification\Notification;
use App\Repositories\AbstractBaseRepository;

class AppNotificationRepository extends AbstractBaseRepository
{
    protected $modelName = Notification::class;
}
