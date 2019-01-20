<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/15/19
 * Time: 6:31 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Modules\PMS\Repositories\OrganizationRepository;

class OrganizationService
{
    use CrudTrait;
    private $organizationRepository;
    private $projectResearchOrgService;
    private $projectProposalService;

    public function __construct(OrganizationRepository $organizationRepository, ProjectResearchOrgService $projectResearchOrgService, ProjectProposalService $projectProposalService)
    {
        $this->organizationRepository = $organizationRepository;
        $this->projectResearchOrgService = $projectResearchOrgService;
        $this->projectProposalService = $projectProposalService;
        $this->setActionRepository($this->organizationRepository);

    }

    public function getAllOrganization($proposalId, $type)
    {
        $alreadyAddedIds = $this->projectResearchOrgService->getAlreadyAddedOrganizationIds($proposalId);
        $organizations = $this->organizationRepository->getOrganizationExceptIds($alreadyAddedIds);
        $organizations['other_organization'] = '+ ' . trans('pms::project_proposal.add_new_organization');
        return $organizations;
    }

    public function findOrganizationById($id)
    {
        $organization = $this->findOne($id);
        if (is_null($organization)) {
            abort(404);

        } else {
            return $organization;
        }
    }

}