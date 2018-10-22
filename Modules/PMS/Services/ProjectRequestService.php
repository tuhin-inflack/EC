<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use Modules\PMS\Entities\ProjectRequest;
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
        $projectRequest = $this->projectRequestRepository->save($data);

        return $projectRequest;
    }

    public function update(ProjectRequest $projectRequest, array $data)
    {
        $projectRequest = $this->projectRequestRepository->update($projectRequest, $data);

        return $projectRequest;
    }

    public function delete(ProjectRequest $projectRequest)
    {
        return $this->projectRequestRepository->delete($projectRequest);
    }
}