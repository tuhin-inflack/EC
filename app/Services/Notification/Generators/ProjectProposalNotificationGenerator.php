<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 2/5/19
 * Time: 6:38 PM
 */

namespace App\Services\Notification\Generators;


use App\Entities\Notification\NotificationType;
use App\Models\NotificationInfo;
use App\Services\Notification\AppNotificationService;
use App\Services\Notification\EmailNotifiable;
use App\Services\Notification\SystemNotifiable;
use App\Traits\MailSender;

class ProjectProposalNotificationGenerator extends BaseNotificationGenerator implements SystemNotifiable, EmailNotifiable
{
    use MailSender;

    private $appNotificationService;

    /**
     * ResearchProposalNotificationGenerator constructor.
     * @param AppNotificationService $appNotificationService
     */
    public function __construct(AppNotificationService $appNotificationService)
    {
        $this->appNotificationService = $appNotificationService;
    }


    public function notify(NotificationInfo $notificationInfo, NotificationType $notificationTypeDetails)
    {
        $this->saveAppNotification($notificationInfo->getDynamicValues()['notificationData']);
        //$this->sendEmailNotification();
    }

    public function saveAppNotification($data)
    {
        //TODO: Do the implementation
        $this->appNotificationService->save($data);
    }

    public function sendEmailNotification($data)
    {
        //TODO: Do the implementation
        $this->sendEmail('toaddress', null);
    }
}
