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
            $data['status'] = 'pending';

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

    public function update(ProjectRequest $projectRequest, array $data)
    {
        $projectRequest = $this->projectRequestRepository->update($projectRequest, $data);

        return $projectRequest;
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


}