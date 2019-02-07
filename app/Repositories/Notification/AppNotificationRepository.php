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

    public function markAsRead($toUserId)
    {
        $this->model->where('to_user_id', $toUserId)->update(['is_read' => true]);
    }

    public function getLatest($limit = 20)
    {
        return $this->model->latest()->limit($limit)->get();
    }
}
