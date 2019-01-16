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
use Modules\PMS\Entities\ProjectRequestImage;
use Modules\PMS\Repositories\OrganizationRepository;
use Modules\PMS\Repositories\ProjectResearchOrgRepository;
use Prophecy\Doubler\Generator\TypeHintReference;

class ProjectResearchOrgService
{
    use CrudTrait;
    private $projectResearchOrgRepository;
    private $organizationRepository;

    public function __construct(ProjectResearchOrgRepository $projectResearchOrgRepository, OrganizationRepository $organizationRepository)
    {
        $this->projectResearchOrgRepository = $projectResearchOrgRepository;
        $this->organizationRepository = $organizationRepository;
        $this->setActionRepository($this->projectResearchOrgRepository);
    }

    public function storeData($projectResearchData)
    {
//        dd($projectResearchData);
        $organizationId = (int)$projectResearchData['organization_id'];
        $status = false;
        if ($organizationId > 0) {
            $status = $this->save($projectResearchData);
        } else {
            $organization = $this->organizationRepository->save($projectResearchData);
            $projectResearchData['organization_id'] = $organization['id'];
            $status = $this->projectResearchOrgRepository->save($projectResearchData);
        }

        if ($status) {
            return new Response(trans('labels.save_success'));
        }
    }

}