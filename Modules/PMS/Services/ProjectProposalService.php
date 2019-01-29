<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            $data['status'] = 'pending';

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
                'message' => "",
            ];
            $this->workflowService->createWorkflow($workflowData);
            // Workflow initiate done

            return $proposalSubmission;
        });
    }

    public function update()
    {

    }

    public function delete()
    {

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

        foreach ($tasks as $task){
            array_push($chartData, array(
                "pID" => $task->id,
                "pName" => $task->taskName->name,
                "pStart" => $task->start_time,
                "pEnd" => $task->end_time,
                "pPlanStart" => $task->expected_start_time,
                "pPlanEnd" => $task->expected_end_time,
                "pClass" => "gtaskblue",
                "pNotes" => "SDisas ascas cacasc",
            ));
        }
        return $chartData;
    }
}