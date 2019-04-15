<?php
namespace Modules\PMS\Services;

use App\Services\Sharing\ShareConversationService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;


class PMSService
{
    use CrudTrait;

    private $dashboardService;
    private $shareConversationService;
    private $userService;

    public function __construct(DashboardWorkflowService $dashboardService,
                                ShareConversationService $shareConversationService,
                                UserService $userService
    )
    {
        $this->dashboardService = $dashboardService;
        $this->shareConversationService = $shareConversationService;
        $this->userService = $userService;
    }

    /*
     * Function to get all the tasks related to PMS of the auth user
     */
    public function getPendingTasks()
    {
        $featureName = config('constants.project_proposal_feature_name');
        $pendingTasks[] = $this->dashboardService->getDashboardWorkflowItems($featureName);
        $featureName = config('constants.project_details_proposal_feature_name');
        $pendingTasks[] = $this->dashboardService->getDashboardWorkflowItems($featureName);

        return $pendingTasks;
    }

    public function getRejectedTasks()
    {
        $featureName = config('constants.project_proposal_feature_name');
        $rejectedTasks[] = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);
        $featureName = config('constants.project_details_proposal_feature_name');
        $rejectedTasks[] = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);

        return $rejectedTasks;
    }

    /*
     * Method to fetch pending share conversations for the auth users from all features
     */
    public function getShareConversations()
    {
        $loggedUserDesignationId = $this->userService->getDesignationId(Auth::user()->username);
        $shareConversations = $this->shareConversationService->getShareConversationByDesignation($loggedUserDesignationId);
        if(!is_null($shareConversations)){
            foreach ($shareConversations as $shareConversation)
            {
                $data['id'] = $shareConversation->id;
                $data['ref_table_id'] = $shareConversation->ref_table_id;
                $data['feature_name'] = $shareConversation->feature->name;
                $data['message'] = $shareConversation->message;

                if($shareConversation->feature->name == config('constants.project_proposal_feature_name'))
                {
                    $data['proposal_title'] = $shareConversation->projectProposal->title;
                    $data['review_url'] =route('sending-project-for-review', [$shareConversation->ref_table_id, $shareConversation->workflowDetails->workflow_master_id, $shareConversation->id]);
                }
                elseif($shareConversation->feature->name == config('constants.project_details_proposal_feature_name'))
                {
                    $data['proposal_title'] = $shareConversation->projectDetailProposal->title;
                    $data['review_url'] =route('sending-project-detail-for-review', [$shareConversation->ref_table_id, $shareConversation->workflowDetails->workflow_master_id, $shareConversation->id]);
                }
                else
                    $data['proposal_title'] = 'N/A';

                $allShareConvs[] = $data;
            }
        }
        else
            $allShareConvs = null;

        return $allShareConvs;
    }
}
