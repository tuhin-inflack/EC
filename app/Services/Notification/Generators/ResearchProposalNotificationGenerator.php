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
use App\Repositories\Notification\NotificationTypeRepository;
use App\Services\Notification\AppNotificationService;
use App\Services\Notification\EmailNotifiable;
use App\Services\Notification\SystemNotifiable;
use App\Services\UserService;
use App\Traits\MailSender;
use const http\Client\Curl\AUTH_ANY;
use Illuminate\Support\Facades\Auth;
use Modules\HRM\Services\DesignationService;
use Modules\RMS\Services\ResearchProposalSubmissionService;
use Prophecy\Doubler\Generator\TypeHintReference;

class ResearchProposalNotificationGenerator extends BaseNotificationGenerator implements SystemNotifiable, EmailNotifiable
{
    use MailSender;

    private $appNotificationService;
    private $notificationTypeRepository;
    private $userService;
    private $researchProposalSubmissionService;


    /**
     * ResearchProposalNotificationGenerator constructor.
     * @param UserService $userService
     * @param AppNotificationService $appNotificationService
     * @param NotificationTypeRepository $notificationTypeRepository
     * @param ResearchProposalSubmissionService $researchProposalSubmissionService
     */
    public function __construct(
        UserService $userService,
        AppNotificationService $appNotificationService,
        NotificationTypeRepository $notificationTypeRepository,
        ResearchProposalSubmissionService $researchProposalSubmissionService
    )
    {
        $this->appNotificationService = $appNotificationService;
        $this->notificationTypeRepository = $notificationTypeRepository;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
        $this->userService = $userService;
    }


    public function notify(NotificationInfo $notificationInfo, NotificationType $notificationType)
    {

        $this->saveAppNotification($notificationInfo);

    }

    public function saveAppNotification($data)
    {
        $notificationType = $this->notificationTypeRepository->findBy(['name' => $data->notificationType])->first();
        $notificationData = (array)$data->dynamicValues;
        $notificationData['type_id'] = $notificationType->id;
        $notificationData['from_user_id'] = Auth::user()->id;

        $users = $this->getNotifiableUsers($data);

        foreach ($users as $user) {
            $notificationData['to_user_id'] = $user['id'];
            $this->appNotificationService->save($notificationData);
            $user = $this->userService->findOne($user['id']);

            $researchProposal = $this->researchProposalSubmissionService->findOne($notificationData['ref_table_id']);
            $notificationMessage = $this->getNotificationMessage($data);
            $notificationUrl = $data->dynamicValues['url'];

            dd($researchProposal, $notificationMessage, $notificationUrl);
        }
    }

    public function sendEmailNotification($data)
    {
        // TODO: Implement sendEmailNotification() method.
    }

    /**
     * @param $data
     * @return array
     */
    private function getNotifiableUsers($data): array
    {
        if (!empty($data->dynamicValues['to_users_designation'])) {
            $users = $this->userService->getUserForNotificationSend($data->dynamicValues['to_users_designation']);
        } else {
            $users = [];
        }

        if (isset($data->dynamicValues['to_employee_id']) && count($data->dynamicValues['to_employee_id']) > 0) {
            $employeesUsers = $this->userService->getUserByEmployeeIds($data->dynamicValues['to_employee_id'])->toArray();
            $users = array_merge($users, $employeesUsers);
        }

        if (isset($data->dynamicValues['proposal_id'])) {
            $proposal = $this->researchProposalSubmissionService->findOne($data->dynamicValues['proposal_id']);
            array_push($users, $proposal->submittedBy->toArray());
        }

        return $users;
    }

    /**
     * @param $data
     * @return string
     */
    private function getNotificationMessage($data): string
    {
        return $data->dynamicValues['message'];
    }
}
