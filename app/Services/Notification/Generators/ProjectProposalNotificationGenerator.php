<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 2/5/19
 * Time: 6:38 PM
 */

namespace App\Services\Notification\Generators;


use App\Entities\Notification\NotificationType;
use App\Models\NotificationInfo;
use App\Services\Notification\AppNotificationService;
use App\Services\Notification\EmailNotifiable;
use App\Services\Notification\SystemNotifiable;
use App\Services\UserService;
use App\Traits\MailSender;
use Modules\PMS\Services\ProjectProposalService;

class ProjectProposalNotificationGenerator extends BaseNotificationGenerator implements SystemNotifiable, EmailNotifiable
{
    use MailSender;

    private $appNotificationService;
    private $userService;
    private $projectProposalService;

    /**
     * ProjectProposalNotificationGenerator constructor.
     * @param AppNotificationService $appNotificationService
     */
    public function __construct(AppNotificationService $appNotificationService,
                                UserService $userService,
                                ProjectProposalService $projectProposalService)
    {
        $this->appNotificationService = $appNotificationService;
        $this->userService = $userService;
        $this->projectProposalService = $projectProposalService;
    }

    public function notify(NotificationInfo $notificationInfo, NotificationType $notificationTypeDetails)
    {
        $notificationData = $notificationInfo->getDynamicValues()['notificationData'];
        $notificationData['type_id'] = $notificationTypeDetails->id;
        $recipients = $this->fetchRecipients($notificationData['ref_table_id'] , $notificationInfo->getDynamicValues()['event']);
        //dd($notificationData, $recipients);
        foreach($recipients as $recipient)
        {
            $notificationData['to_user_id'] = $recipient['id'];
            $this->saveAppNotification($notificationData);
        }
        //$this->sendEmailNotification();
    }

    public function saveAppNotification($data)
    {
        return $this->appNotificationService->save($data);
    }

    public function fetchRecipients($proposalId, $event)
    {
        $recipients = config('constants.'.$event);
        $usersByKeys =[];
        if($key = array_search('initiator', $recipients) !== false)
        {
            unset($recipients[$key]);
            $proposal = $this->projectProposalService->findOne($proposalId);
            $usersByKeys = $proposal->proposalSubmittedBy->getAttributes();
        }
        $users = $this->userService->getUserForNotificationSend($recipients);
        count($usersByKeys)? array_push($users, $usersByKeys): '';

        return $users;
    }

    public function sendEmailNotification($data)
    {
        //TODO: Do the implementation
        $this->sendEmail('toaddress', null);
    }
}
