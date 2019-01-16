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

        $alreadyAddedIds  = $this->projectResearchOrgService->getAlreadyAddedOrganizationIds($proposalId);

        $organizations = $this->organizationRepository->getOrganizationExceptIds($alreadyAddedIds);
//        dd($organizations);
//        $organizations = $this->organizationRepository->findAll()->pluck( 'name', 'id' )->toArray();

        $organizations['other_organization'] = '+ Add new organization';
        return $organizations;
    }

}