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
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Modules\RMS\Repositories\ResearchPublicationRepository;
use Modules\RMS\Repositories\ResearchRepository;


class ResearchService
{

    use CrudTrait;
    use FileTrait;
    /**
     * @var ResearchRepository
     */
    private $researchRepository;
    private $researchPublicationRepository;
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
    public function __construct(ResearchRepository $researchRepository, FeatureService $featureService,  WorkflowService $workflowService, ResearchPublicationRepository $researchPublicationRepository)
    {
        $this->researchRepository = $researchRepository;
        $this->researchPublicationRepository = $researchPublicationRepository;
        $this->setActionRepository($researchRepository);
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {


            $research = $this->researchRepository->save($data);

            //Save workflow

//            $featureName = Config::get('rms.research_feature_name');;
//            $feature = $this->featureService->findBy(['name' => $featureName])->first();
//            $workflowData = [
//                'feature_id' => $feature->id,
//                'rule_master_id' => $feature->workflowRuleMaster->id,
//                'ref_table_id' => $research->id,
//                'message' => Config::get('rms-notification.research_submitted'),
//            ];
//
//            $this->workflowService->createWorkflow($workflowData);

            return $research;
        });
    }

    public function getAll()
    {
        return $this->researchRepository->findAll();
    }

    public function savePublication($data, $researchId)
    {
        $publicationData = ['research_id'=> $researchId, 'description' => $data['description']];
        $save = $this->researchPublicationRepository->save($publicationData);
        if(array_key_exists('attachments', $data)) $this->savePublicationAttachments($save->getAttribute('id'), $data);

        // TODO: Integrate workflow here

        return true;
    }

    private function savePublicationAttachments($publicationId, $data)
    {
        $publication = $this->researchPublicationRepository->findOne($publicationId);
        foreach ($data['attachments'] as $file) {
            $ext = $file->getClientOriginalExtension();
            $filePath = $this->upload($file, 'research_publications');
            $publication->attachments()->create([
                'path' => $filePath,
                'name' => $file->getClientOriginalName(),
                'ext' => $ext,
            ]);
        }
    }
}
