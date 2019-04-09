<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 03/04/19
 * Time: 16:40
 */

namespace Modules\RMS\Services;


use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
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

    /**
     * ResearchDetailSubmissionService constructor.
     * @param ResearchDetailSubmissionRepository $researchDetailSubmissionRepository
     */

    public function __construct(ResearchDetailSubmissionRepository $researchDetailSubmissionRepository)
    {
        $this->researchDetailSubmissionRepository = $researchDetailSubmissionRepository;
        $this->setActionRepository($this->researchDetailSubmissionRepository);
    }

    public function storeResearchDetails($data)
    {
        return DB::transaction(function () use ($data) {
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
//
//            $featureName = Config::get('constants.research_proposal_feature_name');
//            $feature = $this->featureService->findBy(['name' => $featureName])->first();
//            $workflowData = [
//                'feature_id' => $feature->id,
//                'rule_master_id' => $feature->workflowRuleMaster->id,
//                'ref_table_id' => $proposalSubmission->id,
//                'message' => $data['message'],
//            ];
//
//            $this->workflowService->createWorkflow($workflowData);
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
}