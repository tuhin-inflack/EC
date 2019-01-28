<?php

namespace Modules\RMS\Services;

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

    public function __construct(ResearchProposalSubmissionRepository $researchProposalSubmissionRepository)
    {
        /** @var ResearchProposalSubmissionRepository $researchProposalSubmissionRepository */
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;

        $this->setActionRepository($researchProposalSubmissionRepository);
    }

    public function store(array $data)
    {
            return DB::transaction(function () use ($data) {
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

    public function getZipFilePath($proposalId)
    {
        $researchProposal = $this->findOne($proposalId);

        $filePaths = $researchProposal->researchProposalSubmissionAttachments->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath =  Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }
}