<?php

namespace Modules\RMS\Services;

use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        /** @var ResearchProposalSubmissionRepository $researchProposalSubmissionRepository */
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;
        $this->workflowService = $workflowService;

        $this->setActionRepository($researchProposalSubmissionRepository);
    }

    public function store(array $data)
    {

        if ($data['type'] == 'draft') {
            return DB::transaction(function () use ($data) {
                $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
                $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
                $data['status'] = 'pending';
                $data['type'] = $data['type'];

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

                return $proposalSubmission;
            });
        } else {
            return DB::transaction(function () use ($data) {
                $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
                $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
                $data['status'] = 'pending';
                $data['type'] = $data['type'];

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
    }

    public function getAll()
    {
        return $this->researchProposalSubmissionRepository->findAll();
    }

    public function updateRequest(array $data, ResearchProposalSubmission $researchProposalSubmission)
    {
        return DB::transaction(function () use ($data, $researchProposalSubmission) {
            $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['status'] = 'pending';
            $data['type'] = $data['type'];

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
}
