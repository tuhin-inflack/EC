<?php

namespace Modules\RMS\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Repositories\ResearchProposalSubmissionRepository;


class ResearchProposalSubmissionService
{
    use CrudTrait;
    use FileTrait;

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
    }

    public function getAll()
    {
        return $this->researchProposalSubmissionRepository->findAll();
    }
}