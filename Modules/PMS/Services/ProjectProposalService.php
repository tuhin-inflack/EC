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
use Modules\PMS\Entities\ProjectProposalFile;
use Modules\PMS\Entities\ProjectRequest;

use Modules\PMS\Entities\ProjectRequestImage;
use Modules\PMS\Repositories\ProjectProposalRepository;
use Modules\PMS\Repositories\ProjectRequestRepository;


class ProjectProposalService
{
    use CrudTrait;
    private $projectProposalRepository;

    /**
     * ProjectRequestService constructor.
     * @param $projectRequestRepository $projectRequestRepository
     */

    public function __construct(ProjectProposalRepository $projectProposalRepository)
    {

        $this->projectProposalRepository = $projectProposalRepository;
        $this->setActionRepository($this->projectProposalRepository);
    }

    public function getAll()
    {
        return $this->projectProposalRepository->findAll();
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

    public function update()
    {

    }

    public function delete()
    {

    }

    public function getProposalById($id)
    {
        $proposal = $this->findOne($id);
        if (is_null($proposal)) {
            abort(404);
        } else {
            return $proposal;
        }

    }

}
