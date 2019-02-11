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
use Prophecy\Doubler\Generator\TypeHintReference;

class ResearchProposalNotificationGenerator extends BaseNotificationGenerator implements SystemNotifiable
{
    use MailSender;

    private $appNotificationService;
    private $notificationTypeRepository;
    private $userService;


    /**
     * ResearchProposalNotificationGenerator constructor.
     * @param AppNotificationService $appNotificationService
     */
    public function __construct(AppNotificationService $appNotificationService, NotificationTypeRepository $notificationTypeRepository, UserService $userService)
    {
        $this->appNotificationService = $appNotificationService;
        $this->notificationTypeRepository = $notificationTypeRepository;
        $this->userService = $userService;

    }


    public function notify(NotificationInfo $notificationInfo, NotificationType $notificationTypeDetails)
    {

        $this->saveAppNotification($notificationInfo);

    }

    public function saveAppNotification($data)
    {

        $notificationType = $this->notificationTypeRepository->findBy(['name' => $data->notificationType])->first();
        $notificationData = (array)$data->dynamicValues;
        $notificationData['type_id'] = $notificationType->id;
        $notificationData['from_user_id'] = Auth::user()->id;
       // dd($data->dynamicValues);
        $users = $this->userService->getUserForNotificationSend($data->dynamicValues['to_users_designation']);


        $this->appNotificationService->save($notificationData);
    }

//    public function sendEmailNotification($data)
//    {
//        //TODO: Do the implementation
//        $this->sendEmail('toaddress', null);
//    }
}