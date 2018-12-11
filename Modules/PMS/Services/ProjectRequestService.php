<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use Illuminate\Http\Response;
use Modules\PMS\Entities\ProjectRequest;

use Modules\PMS\Entities\ProjectRequestImage;
use Modules\PMS\Repositories\ProjectRequestRepository;


class ProjectRequestService
{
    private $projectRequestRepository;

    /**
     * ProjectRequestService constructor.
     * @param $projectRequestRepository $projectRequestRepository
     */

    public function __construct(ProjectRequestRepository $projectRequestRepository)
    {
        $this->projectRequestRepository = $projectRequestRepository;
    }

    public function getAll()
    {
        return $this->projectRequestRepository->findAll();
    }

    public function store(array $data)
    {
        $send_to = $data['send_to'];
        $send_to = implode(',', $send_to);
        $data['send_to'] = $send_to;

        $projectRequest = $this->projectRequestRepository->save($data);

        foreach ($data['attachment'] as $image) {
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/uploads', $filename);

            $image = new ProjectRequestImage([
                'attachment' => $filename,
                'request_id' => $projectRequest->id
            ]);

            $projectRequest->projectRequestImages()->save($image);
        }
        
        return new Response('Project Proposal Request stored successfully!', Response::HTTP_OK);
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


}