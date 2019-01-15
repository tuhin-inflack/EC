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
use Modules\PMS\Repositories\ProjectResearchOrgRepository;
use Prophecy\Doubler\Generator\TypeHintReference;

class ProjectResearchOrgService
{
    use CrudTrait;
    private $projectResearchOrgRepository;

    public function __construct(ProjectResearchOrgRepository $projectResearchOrgRepository)
    {
        $this->projectResearchOrgRepository = $projectResearchOrgRepository;
        $this->setActionRepository($this->projectResearchOrgRepository);
    }

    public function storeData($projectResearchData)
    {
        $status = $this->save($projectResearchData);
        if ($status) {
            return new Response( trans('labels.save_success'));
        }
    }

}