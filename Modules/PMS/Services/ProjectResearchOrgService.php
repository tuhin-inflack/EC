<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/15/19
 * Time: 7:37 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Modules\PMS\Repositories\OrganizationRepository;
use Modules\PMS\Repositories\ProjectResearchOrgRepository;

class ProjectResearchOrgService
{
    use CrudTrait;
    private $projectResearchOrgRepository;
    private $organizationRepository;
    private $projectProposalService;

    public function __construct(ProjectResearchOrgRepository $projectResearchOrgRepository,
                                OrganizationRepository $organizationRepository, ProjectProposalService $projectProposalService)

    {
        $this->projectResearchOrgRepository = $projectResearchOrgRepository;
        $this->organizationRepository = $organizationRepository;
        $this->projectProposalService = $projectProposalService;
        $this->setActionRepository($this->projectResearchOrgRepository);
    }

    public function storeData($projectResearchData, $projectId)
    {
        $project = $this->projectProposalService->findOne($projectId);
        $organizationId = (int)$projectResearchData['organization_id'];

        if ($organizationId > 0) {
            $project->organizations()->attach($organizationId);
        } else {
            $organization = $this->organizationRepository->save($projectResearchData);
            $project->organizations()->attach($organization['id']);
        }
        return new Response(trans('labels.save_success'));
    }

    public function getAlreadyAddedOrganizationIds($proposalId)
    {
        $project = $this->projectProposalService->findOne($proposalId);
        $alreadyAddedIds = [];
        if (is_null($project)) {
            abort(404);
        } else {
            $ids = $project->organizations->toArray();
            $alreadyAddedIds = array_column($ids, 'id');
        }
        return $alreadyAddedIds;

    }

}