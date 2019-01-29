<?php

namespace Modules\RMS\Services;

use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Database\Eloquent\Model;
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

    public function __construct(ResearchProposalSubmissionRepository $researchProposalSubmissionRepository, WorkflowService $workflowService)
    {
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;
        $this->workflowService = $workflowService;

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
            $this->workflowService->createWorkflow(['rule_master_id' => 1, 'feature_id' => 1,
                'ref_table_id' => $proposalSubmission->id, 'message' => 'Please review the item']);

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
            $data['status'] = 'pending';
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
}
