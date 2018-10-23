<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:24 PM
 */

namespace Modules\PMS\Repositories;

use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\ProjectRequest;


class ProjectRequestRepository extends AbstractBaseRepository
{
    protected $modelName = ProjectRequest::class;

    public function approveProjectProposal($projectRequest)
    {
        $status  = $projectRequest->status;
        $id = $projectRequest->id;
        return ProjectRequest::where('id', $id)
            ->update(['status' => 1]);

    }

    public function rejectProjectProposal($projectRequest)
    {
        $status  = $projectRequest->status;
        $id = $projectRequest->id;
        return ProjectRequest::where('id', $id)
            ->update(['status' => 2]);

    }
}