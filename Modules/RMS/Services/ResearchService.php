<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 1/24/19
 * Time: 6:36 PM
 */

namespace Modules\RMS\Services;

use App\Services\TaskService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Repositories\ResearchRepository;


class ResearchService
{

    use CrudTrait;
    /**
     * @var ResearchRepository
     */
    private $researchRepository;
    /**
     * @var TaskService
     */
    private $taskService;
    /**
     * @var $featureService ;
     */
    private $featureService;
    /**
     * @var $workflowService
     */
    private $workflowService;

    /**
     * ResearchService constructor.
     * @param ResearchRepository $researchRepository
     */
    public function __construct(ResearchRepository $researchRepository, FeatureService $featureService, WorkflowService $workflowService)
    {
        $this->researchRepository = $researchRepository;
        $this->setActionRepository($researchRepository);
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {


            $research = $this->researchRepository->save($data);


            return $research;
        });
    }

    public function getAll()
    {
        return $this->researchRepository->findAll();
    }

    public function savePublication($data, $researchId)
    {
        // $save = $this->researchRepository->save($data);

        //Save workflow

        $featureName = Config::get('rms.research_feature_name');;
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $workflowData = [
            'feature_id' => $feature->id,
            'rule_master_id' => $feature->workflowRuleMaster->id,
            'ref_table_id' => $researchId,
            'message' => Config::get('rms-notification.research_paper_submitted'),
        ];

        $this->workflowService->createWorkflow($workflowData);

        return true;
    }

    public function updateReInitiate(array $data, $researchId)
    {


        $featureName = Config::get('rms.research_feature_name');

        $feature = $this->featureService->findBy(['name' => $featureName])->first();

        $reInitializeData = [
            'feature_id' => $feature->id,
            'ref_table_id' => $researchId,
            'message' => $data['message'],
        ];

        $this->workflowService->reinitializeWorkflow($reInitializeData);
        return new Response(trans('rms::research_proposal.re_initiate_success'));

    }

    public function closeWorkflow($workflowMasterId)
    {
        $response = $this->workflowService->closeWorkflow($workflowMasterId);
        return Response(trans('labels.research_closed'));
    }
}
