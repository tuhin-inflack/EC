<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Constants\NotificationType;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use Modules\PMS\Entities\ProjectProposal;
use Modules\PMS\Entities\ProjectProposalFile;
use Modules\PMS\Repositories\ProjectProposalRepository;


class ProjectProposalService
{
    use CrudTrait;
    use FileTrait;
    private $projectProposalRepository;
    private $featureService;
    private $workflowService;

    /**
     * ProjectRequestService constructor.
     * @param ProjectProposalRepository $projectProposalRepository
     * @param FeatureService $featureService
     * @param WorkflowService $workflowService
     */

    public function __construct(ProjectProposalRepository $projectProposalRepository,
                                FeatureService $featureService,
                                WorkflowService $workflowService)
    {
        $this->projectProposalRepository = $projectProposalRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;

        $this->setActionRepository($projectProposalRepository);
    }

    public function getAll()
    {
        return $this->projectProposalRepository->findAll();
    }

    public function store(array $data)
    {

        return DB::transaction(function () use ($data) {
            $data['status'] = 'PENDING';

            $proposalSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'project-submissions');

                $file = new ProjectProposalFile([
                    'proposal_id' => $proposalSubmission->id,
                    'attachments' => $path,
                    'file_name' => $fileName
                ]);

                $proposalSubmission->projectProposalFiles()->save($file);
            }

            // Initiating Workflow
            $featureName = config('constants.project_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();
            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $proposalSubmission->id,
                'message' => $data['message'],
            ];
            $this->workflowService->createWorkflow($workflowData);
            // Workflow initiate done

            //Generating notification
            $dynamicValues['notificationData'] = [
                'type_id' => 1,
                'ref_table_id'=> $proposalSubmission->id,
                'from_user_id'=> Auth::user()->id,
                'message'=> 'A project has been submitted',
                'is_read'=> 0,
            ];
            $dynamicValues['event'] = 'project_proposal_submission';

            event(new NotificationGeneration(new NotificationInfo(NotificationType::PROJECT_PROPOSAL_SUBMISSION, $dynamicValues)));
            // Notification generation done

            return $proposalSubmission;
        });
    }

    public function getProposalById($id)
    {
        $proposal = $this->findOne($id);
        if (is_null($proposal)) {
            abort(404);
        } else {
            return $proposal;
        }
    }

    public function getZipFilePath($proposalId)
    {
        $researchProposal = $this->findOne($proposalId);

        $filePaths = $researchProposal->projectProposalFiles->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function getGanttChartData(ProjectProposal $projectProposal)
    {
        $tasks = $projectProposal->task;
        $chartData = [];
    }

    public function getProjectProposalByStatus()
    {
        $projectProposal = new ProjectProposal();
        return [
            $projectProposal->where('status', '=', 'pending')->count(),
            $projectProposal->where('status', '=', 'in progress')->count(),
            $projectProposal->where('status', '=', 'reviewed')->count()
        ];
    }

    public function getProjectProposalBySubmissionDate()
    {
        return ProjectProposal::orderBy('id', 'DESC')->limit(5)->get();
    }
}
