<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 2/5/19
 * Time: 6:38 PM
 */

namespace App\Services\Notification\Generators;


use App\Entities\Notification\NotificationType;
use App\Entities\User;
use App\Models\NotificationInfo;
use App\Services\Notification\AppNotificationService;
use App\Services\Notification\EmailNotifiable;
use App\Services\Notification\SystemNotifiable;
use App\Services\UserService;
use App\Traits\MailSender;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use Modules\PMS\Emails\ProjectWorkflowNotification;
use Modules\PMS\Entities\ProjectProposal;
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
     * @param UserService $userService
     * @param ProjectProposalService $projectProposalService
     */
    public function __construct(AppNotificationService $appNotificationService,
                                UserService $userService,
                                ProjectProposalService $projectProposalService)
    {
        $this->appNotificationService = $appNotificationService;
        $this->userService = $userService;
        $this->projectProposalService = $projectProposalService;
    }

    public function notify(NotificationInfo $notificationInfo, NotificationType $notificationType)
    {
        $notificationData = $notificationInfo->getDynamicValues()['notificationData'];
        $notificationData['type_id'] = $notificationType->id;
        $recipients = $this->fetchRecipients($notificationData['ref_table_id'], $notificationInfo->getDynamicValues()['event']);

        foreach ($recipients as $recipient) {
            $notificationData['to_user_id'] = $recipient['id'];
            $this->saveAppNotification($notificationData);

            $user = $this->userService->findOne($recipient['id']);
            $projectProposal = $this->projectProposalService->findOne($this->getProjectProposalId($notificationInfo));
            $notificationMessage = $this->getNotificationMessage($notificationInfo);
            $notificationUrl = $notificationInfo->getDynamicValues()['notificationData']['url'];

            $this->sendProjectProsalEmailNotification($notificationType, $user, $projectProposal, $notificationMessage, $notificationUrl);
        }
    }

    public function saveAppNotification($data)
    {
        return $this->appNotificationService->save($data);
    }

    public function fetchRecipients($proposalId, $event)
    {
        $recipients = config('constants.' . $event);
        $usersByKeys = [];

        if ($key = array_search('initiator', $recipients) !== false) {
            unset($recipients[$key]);
            $proposal = $this->projectProposalService->findOne($proposalId);
            $usersByKeys = $proposal->proposalSubmittedBy->getAttributes();
        }
        $users = $this->userService->getUserForNotificationSend($recipients);
        count($usersByKeys) ? array_push($users, $usersByKeys) : '';

        return $users;
    }

    public function sendEmailNotification($data)
    {
        $this->sendEmail($data['user']->email, new ProjectWorkflowNotification($data['projectProposal'], $data['message'], $data['url']));
    }

    /**
     * @param NotificationInfo $notificationInfo
     * @return mixed
     */
    private function getProjectProposalId(NotificationInfo $notificationInfo)
    {
        return $notificationInfo->dynamicValues['notificationData']['ref_table_id'];
    }

    /**
     * @param NotificationType $notificationType
     * @param User $user
     * @param ProjectProposal $projectProposal
     * @param $notificationMessage
     * @param $notificationUrl
     */
    private function sendProjectProsalEmailNotification(
        NotificationType $notificationType,
        User $user,
        ProjectProposal $projectProposal,
        $notificationMessage,
        $notificationUrl
    ): void
    {
        if ($notificationType->is_email_notification) {
            $emailData = [
                'user' => $user,
                'projectProposal' => $projectProposal,
                'message' => $notificationMessage,
                'url' => $notificationUrl
            ];

            $this->sendEmailNotification($emailData);
        }
    }

    /**
     * @param NotificationInfo $notificationInfo
     * @return mixed
     */
    private function getNotificationMessage(NotificationInfo $notificationInfo)
    {
        return $notificationInfo->dynamicValues['notificationData']['message'];
    }
}
