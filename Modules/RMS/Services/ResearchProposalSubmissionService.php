<?php

namespace Modules\RMS\Services;

use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\RMS\Entities\ResearchProposalSubmission;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Repositories\ResearchProposalSubmissionRepository;


class ResearchProposalSubmissionService
{
    use CrudTrait;
    use FileTrait;

    private $researchProposalSubmissionRepository;
    private $workflowService;
    private $featureService;

    public function __construct(ResearchProposalSubmissionRepository $researchProposalSubmissionRepository, WorkflowService $workflowService, FeatureService $featureService)
    {
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;
        $this->workflowService = $workflowService;
        $this->featureService = $featureService;

        $this->setActionRepository($researchProposalSubmissionRepository);
    }

    public function store(array $data)
    {


        return DB::transaction(function () use ($data) {
            $data['status'] = 'pending';


            $proposalSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $proposalSubmission->id,
                    'file_name' => $fileName
                ]);

                $proposalSubmission->researchProposalSubmissionAttachments()->save($file);
            }

            //Save workflow
            //TODO: Fill appropriate data instead of static data

            $featureName = Config::get('constants.research_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();
            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $proposalSubmission->id,
                'message' => $data['message'],
            ];


            $this->workflowService->createWorkflow($workflowData);


            return $proposalSubmission;
        });
    }

    public function getAll()
    {
        return $this->researchProposalSubmissionRepository->findAll();
    }

    public function updateRequest(array $data, ResearchProposalSubmission $researchProposalSubmission)
    {
        return DB::transaction(function () use ($data, $researchProposalSubmission) {
            $data['status'] = 'PENDING';
            $proposalSubmission = $this->update($researchProposalSubmission, $data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $researchProposalSubmission->id,
                    'file_name' => $fileName
                ]);

                $researchProposalSubmission->researchProposalSubmissionAttachments()->save($file);
            }
            return $proposalSubmission;
        });
    }

    public function getZipFilePath($proposalId)
    {
        $researchProposal = $this->findOne($proposalId);

        $filePaths = $researchProposal->researchProposalSubmissionAttachments->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }


    public function updateReInitiate(array $data, $researchProposalId)
    {

        return DB::transaction(function () use ($data, $researchProposalId) {
            $data['status'] = 'PENDING';
            $researchProposal = $this->researchProposalSubmissionRepository->findOne($researchProposalId);
            $proposalSubmission = $researchProposal->update($data);

            foreach ($data['attachments'] as $file) {

                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $researchProposalId,
                    'file_name' => $fileName
                ]);

                $researchProposal->researchProposalSubmissionAttachments()->save($file);
            }
            $featureName = Config::get('constants.research_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();

            $reInitializeData = [
                'feature_id' => $feature->id,
                'ref_table_id' => $researchProposalId,
                'message' => $data['message'],
            ];

            $this->workflowService->reinitializeWorkflow($reInitializeData);
            return new Response(trans('rms::research_proposal.re_initiate_success'));

        });
    }


    public function getGanttChartData($tasks)
    {
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
                "pNotes" => $task->description,
            ));
        }
        return $chartData;

    }
}
