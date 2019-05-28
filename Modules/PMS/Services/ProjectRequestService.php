<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\PMS\Entities\ProjectRequest;
use Modules\PMS\Entities\ProjectRequestAttachment;
use Modules\PMS\Entities\ProjectRequestReceiver;
use Modules\PMS\Repositories\ProjectRequestRepository;


class ProjectRequestService
{
    use CrudTrait;
    use FileTrait;

    private $projectRequestRepository;

    /**
     * ProjectRequestService constructor.
     * @param $projectRequestRepository $projectRequestRepository
     */

    public function __construct(ProjectRequestRepository $projectRequestRepository)
    {
        $this->projectRequestRepository = $projectRequestRepository;
        $this->setActionRepository($projectRequestRepository);
    }

    public function getAll()
    {
        return $this->projectRequestRepository->findAll();
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $projectRequest = $this->save($data);

            foreach ($data['attachment'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'project-requests');

                $file = new ProjectRequestAttachment([
                    'attachments' => $path,
                    'project_request_id' => $projectRequest->id,
                    'file_name' => $fileName
                ]);

                $projectRequest->projectRequestAttachments()->save($file);
            }

            foreach ($data['receiver'] as $receiver) {
                $receiver = new ProjectRequestReceiver([
                    'receiver' => $receiver,
                    'project_request_id' => $projectRequest->id
                ]);

                $projectRequest->projectRequestReceivers()->save($receiver);
            }

            return $projectRequest;
        });
    }


    public function updateProjectRequest(array $data, ProjectRequest $projectRequest)
    {
        return DB::transaction(function () use ($data, $projectRequest) {
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $request = $this->update($projectRequest, $data);
            foreach ($projectRequest->projectRequestAttachments as $attachment){
                ProjectRequestAttachment::destroy($attachment->id);
                Storage::disk('internal')->delete($attachment->attachments);
            }

            foreach ($data['attachment'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'project-requests');

                $file = new ProjectRequestAttachment([
                    'attachments' => $path,
                    'project_request_id' => $projectRequest->id,
                    'file_name' => $fileName
                ]);

                $projectRequest->projectRequestAttachments()->save($file);

            }

            $projectRequest->projectRequestReceivers()->delete();

            foreach ($data['receiver'] as $receiver) {
                $receiver = new ProjectRequestReceiver([
                    'receiver' => $receiver,
                    'project_request_id' => $projectRequest->id
                ]);

                $projectRequest->projectRequestReceivers()->save($receiver);
            }
            return $request;
        });

    }

    public function delete(ProjectRequest $projectRequest)
    {
        $projectRequest->requestForwards()->delete();

        return $this->projectRequestRepository->delete($projectRequest);
    }

    public function requestApprove(ProjectRequest $projectRequest)
    {
        return $this->projectRequestRepository->approveProjectProposal($projectRequest);
    }

    public function requestReject(ProjectRequest $projectRequest)
    {
        return $this->projectRequestRepository->rejectProjectProposal($projectRequest);
    }

    public function storeForward($data)
    {
        return $this->projectRequestRepository->forwardProjectRequestStore($data);
    }

    public function getForwardList()
    {
        return $this->projectRequestRepository->findAll(null, ['requestForwards']);
    }

    public function getZipFilePath($projectId)
    {
        $projectRequest = $this->findOne($projectId);

        $filePaths = $projectRequest->projectRequestAttachments->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath =  Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function getProjectInvitationByDeadline()
    {
        return ProjectRequest::orderBy('end_date', 'DESC')
            ->where('end_date', '>=', Carbon::today())
            ->limit(5)
            ->get()
            ->filter(function ($projectRequest) {

                return ((in_array(auth()->user()->id, $projectRequest->projectRequestReceivers->pluck('receiver')->toArray())
                        || auth()->user()->employee->employeeDepartment->department_code == "PMS")
                    && !$projectRequest->proposalsSubmittedByInvitedUserUnderReviewOrApproved->count());
            });
    }

    public function getInvitationReceivedByUser()
    {
        return $this->projectRequestRepository->findAll()
            ->filter(function($projectRequest) {
                return ((in_array(auth()->user()->id, $projectRequest->projectRequestReceivers->pluck('receiver')->toArray())
                        || auth()->user()->employee->employeeDepartment->department_code == "PMS")
                    && !$projectRequest->proposalsSubmittedByInvitedUserUnderReviewOrApproved->count()
                    && Carbon::today()->lessThanOrEqualTo(Carbon::parse($projectRequest->end_date->format('Y-m-d'))));
            });
    }


}