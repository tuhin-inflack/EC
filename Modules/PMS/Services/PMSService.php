<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;


use App\Services\Notification\ReviewUrlGenerator;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkFlowConversationService;
use App\Services\workflow\WorkflowMasterService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use Modules\HRM\Services\EmployeeServices;
use Modules\PMS\Repositories\ProjectProposalRepository;


class PMSService
{
    use CrudTrait;

    private $dashboardService;
    /**
     * @var WorkflowMasterService
     */
    private $workflowMasterService;
    /**
     * @var WorkFlowConversationService
     */
    private $workFlowConversationService;
    /**
     * @var ReviewUrlGenerator
     */
    private $reviewUrlGenerator;

    /**
     * ProjectRequestService constructor.
     * @param ProjectDetailProposalRepository $projectProposalRepository
     * @param FeatureService $featureService
     * @param WorkflowService $workflowService
     * @param UserService $userService
     * @param ReviewUrlGenerator $reviewUrlGenerator
     */

    public function __construct(DashboardWorkflowService $dashboardService

    )
    {
        $this->dashboardService = $dashboardService;

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

    public function getRejctedTasks()
    {
        $featureName = config('constants.project_proposal_feature_name');
        $rejectedTasks[] = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);
        $featureName = config('constants.project_details_proposal_feature_name');
        $rejectedTasks[] = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);

        return $rejectedTasks;
    }
}
