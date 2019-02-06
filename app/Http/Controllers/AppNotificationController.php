<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 2/5/19
 * Time: 3:02 PM
 */

namespace App\Http\Controllers;


use App\Services\Notification\AppNotificationService;

class AppNotificationController extends Controller
{
    private $appNotificationService;

    /**
     * AppNotificationController constructor.
     * @param $appNotificationService
     */
    public function __construct(AppNotificationService $appNotificationService)
    {
        $this->appNotificationService = $appNotificationService;
    }


    public function index()
    {

    }

    public function getUnreadNotification()
    {
        $notifications = $this->appNotificationService->getUnreadNotifications();
        $response = new \stdClass();
        $response->data = $notifications;

        return response()->json($response);
    }

    public function countUnread()
    {
        $count = $this->appNotificationService->getUnreadNotifications()->count();
        $response = new \stdClass();
        $response->data = $count;

        return response()->json($response);
    }
}
