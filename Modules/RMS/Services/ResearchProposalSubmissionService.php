<?php

namespace Modules\RMS\Services;

use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Repositories\ResearchProposalSubmissionRepository;


class ResearchProposalSubmissionService
{
    use CrudTrait;

    private $researchProposalSubmissionRepository;

    public function __construct(ResearchProposalSubmissionRepository $researchProposalSubmissionRepository)
    {
        /** @var ResearchProposalSubmissionRepository $researchProposalSubmissionRepository */
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;

        $this->setActionRepository($researchProposalSubmissionRepository);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['status'] = 'pending';

            $proposalSubmission= $this->save($data);

            foreach ($data['attachments'] as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('research-submissions', $filename);

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $filename,
                    'submissions_id' => $proposalSubmission->id
                ]);

                $proposalSubmission->researchProposalSubmissionAttachments()->save($file);
            }

            return $proposalSubmission;
        });
    }
}