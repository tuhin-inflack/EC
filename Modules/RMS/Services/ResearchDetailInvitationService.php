<?php
/**
 * Created by PhpStorm.
 * User: yousha
 * Date: 4/5/19
 * Time: 2:11 AM
 */

namespace Modules\RMS\Services;


use App\Constants\NotificationType;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use Modules\RMS\Entities\ResearchDetailInvitation;
use Modules\RMS\Entities\ResearchDetailInvitationAttachment;
use Modules\RMS\Entities\ResearchProposalSubmission;
use Modules\RMS\Repositories\ResearchDetailInvitationRepository;

class ResearchDetailInvitationService
{
    use CrudTrait;
    use FileTrait;

    private $researchDetailInvitationRepository;

    public function __construct(ResearchDetailInvitationRepository $researchDetailInvitationRepository)
    {
        $this->researchDetailInvitationRepository = $researchDetailInvitationRepository;
        $this->setActionRepository($this->researchDetailInvitationRepository);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {

            $data['end_date'] = Carbon::createFromFormat('j F, Y', $data['end_date']);
            $data['status'] = "pending";

            $researchDetailInvitationRequest = $this->save($data);

            foreach($data['attachments'] as $file)
            {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-detail-invitations');

                $attachment = new ResearchDetailInvitationAttachment([
                    'attachments' => $path,
                    'research_detail_invitation_id' => $researchDetailInvitationRequest->id,
                    'file_name' => $fileName,
                ]);

                $researchDetailInvitationRequest->researchDetailInvitationAttachments()->save($attachment);

            }

            // Send Notification

//            $notificationData = [
//                'ref_table_id' => $researchDetailInvitationRequest->id,
//                'message' => Config::get('rms-notification.research_invite_submitted') . ' by ' . Auth::user()->name,
//                'to_users_designation' => Config::get('constants.research_invite_submit'),
//                'to_employee_id' => ResearchProposalSubmission::find($data['research_proposal_submission_id'])->auth_user_id
//            ];
//
//            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));

            return $researchDetailInvitationRequest;

        });
    }

    public function getAll()
    {
        return $this->researchDetailInvitationRepository->findAll();
    }

    public function updateResearchDetailInvitationRequest(array $data, ResearchDetailInvitation $researchDetailInvitation)
    {
        return DB::transaction(function() use ($data, $researchDetailInvitation) {

            $data['end_date'] = Carbon::createFromFormat('j F, Y', $data['end_date']);
            $data['status'] = "pending";

            $researchDetailInvitationRequest = $this->update($researchDetailInvitation, $data);

            foreach ($researchDetailInvitation->researchDetailInvitationAttachments as $attachment){
                ResearchDetailInvitationAttachment::destroy($attachment->id);
                Storage::disk('internal')->delete($attachment->attachments);
            }

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-detail-invitations');

                $attachment = new ResearchDetailInvitationAttachment([
                    'attachments' => $path,
                    'research_detail_invitation_id' => $researchDetailInvitation->id,
                    'file_name' => $fileName
                ]);

                $researchDetailInvitation->researchDetailInvitationAttachments()->save($attachment);

            }

            return $researchDetailInvitationRequest;

        });
    }

    public function getZipFilePath(ResearchDetailInvitation $researchDetailInvitation)
    {
        $filePaths = $researchDetailInvitation->researchDetailInvitationAttachments->map(function($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function getResearchDetailInvitationByDeadline()
    {
        return ResearchDetailInvitation::orderBy('end_date', 'desc')->limit()->get();
    }

    public function getDetailInvitationReceivedByUser()
    {
        return $this->researchDetailInvitationRepository->findAll()
            ->filter(function ($researchDetailInvitaion) {
               return (auth()->user()->id == $researchDetailInvitaion->researchApprovedProposal->auth_user_id);
            });
    }
}