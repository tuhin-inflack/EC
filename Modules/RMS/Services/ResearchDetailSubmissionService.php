<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 03/04/19
 * Time: 16:40
 */

namespace Modules\RMS\Services;


use App\Services\UserService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Entities\ResearchDetailSubmissionAttachment;
use Modules\RMS\Repositories\ResearchDetailSubmissionRepository;

class ResearchDetailSubmissionService
{
    use CrudTrait;
    use FileTrait;
    /**
     * @var ResearchDetailSubmissionRepository
     */
    private $researchDetailSubmissionRepository;

    /*
     * @var featureService;
     */
    private $featureService;
    private $workflowService;
    private $userService;

    /**
     * ResearchDetailSubmissionService constructor.
     * @param ResearchDetailSubmissionRepository $researchDetailSubmissionRepository
     */

    public function __construct(ResearchDetailSubmissionRepository $researchDetailSubmissionRepository, FeatureService $featureService,
                                WorkflowService $workflowService, UserService $userService)
    {
        $this->researchDetailSubmissionRepository = $researchDetailSubmissionRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;
        $this->userService = $userService;
        $this->setActionRepository($this->researchDetailSubmissionRepository);
    }

    public function storeResearchDetails($data, $divisionalDirector)
    {
        return DB::transaction(function () use ($data, $divisionalDirector) {
            $data['status'] = 'PENDING';
            $data['auth_user_id'] = Auth::user()->id;

            $researchDetailSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-detail-submissions');

                $file = new ResearchDetailSubmissionAttachment([
                    'attachments' => $path,
                    'research_detail_invitation_id' => $researchDetailSubmission->id,
                    'file_name' => $fileName
                ]);
                $researchDetailSubmission->researchDetailSubmissionAttachment()->save($file);
            }


//            //Save workflow

            $featureName = config('rms.research_proposal_detail_feature');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();

            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $researchDetailSubmission->id,
                'message' => $data['message'],
                'designationTo' => [1 => $divisionalDirector->designation_id]
            ];

            if ($this->isProposalSubmitFromResearchDept()) {
                $workflowData['skipped'] = [1];
            }
//            dd($workflowData);
            $this->workflowService->createWorkflow($workflowData);
//
//            //Send Notifications
//            $notificationData = [
//                'ref_table_id' => $proposalSubmission->id,
//                'message' => Config::get('rms-notification.research_proposal_submitted'),
//                'to_users_designation' => Config::get('constants.research_proposal_submission'),
//
//            ];
//            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));


            return $researchDetailSubmission;
        });
    }

    private function isProposalSubmitFromResearchDept()
    {
        return $this->userService->isResearchDivisionUser(Auth::user());
    }
}