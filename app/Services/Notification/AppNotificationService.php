<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 2/4/19
 * Time: 12:38 PM
 */

namespace App\Services\Notification;


use App\Repositories\Notification\AppNotificationRepository;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;

class AppNotificationService
{
    use CrudTrait;
    /**
     * @var AppNotificationRepository $notificationRepository
     */
    private $notificationRepository;

    /**
     * AppNotificationService constructor.
     * @param AppNotificationRepository $notificationRepository
     */
    public function __construct(AppNotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
        $this->setActionRepository($this->notificationRepository);
    }

    public function getUnreadNotifications()
    {
        $toUserId = Auth::user()->id;
        return $this->findBy(['to_user_id' => $toUserId, 'is_read' => false]);
    }

    public function markAsRead()
    {
        $toUserId = Auth::user()->id;
        $this->notificationRepository->markAsRead($toUserId);
    }

    public function getLatest()
    {
        return $this->notificationRepository->getLatest();
    }

}
