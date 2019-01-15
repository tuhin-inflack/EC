<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Traits\CrudTrait;
use Illuminate\Http\Response;

use Modules\PMS\Repositories\ProjectResearchTaskRepository;


class ProjectResearchTaskService
{
    use CrudTrait;

    private $projectResearchTaskRepository;

    public function __construct(ProjectResearchTaskRepository $projectResearchTaskRepository)
    {
        $this->projectResearchTaskRepository = $projectResearchTaskRepository;
        $this->setActionRepository($projectResearchTaskRepository);
    }

    public function getTasks($projectId)
    {
        return $this->projectResearchTaskRepository->getTasks($projectId);
    }

    public function store(array $data)
    {
        $proposal = $this->projectProposalRepository->save($data);

        foreach ($data['attachment'] as $image) {
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/uploads', $filename);

            $image = new ProjectProposalFile([
                'attachments' => $filename,
            ]);

            $proposal->projectProposalFiles()->save($image);
        }

        return new Response(trans('labels.save_success'), Response::HTTP_OK);
    }
}
