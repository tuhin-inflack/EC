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

    private $researchPublicationAttachmentRepository;


    /**
     * ResearchService constructor.
     * @param ResearchRepository $researchRepository
     */

    public function __construct(ResearchRepository $researchRepository, FeatureService $featureService, WorkflowService $workflowService,
                                ResearchPublicationRepository $researchPublicationRepository)

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

            return $research;
        });
    }

    public function getAll()
    {
        return $this->researchRepository->findAll();
    }

    public function savePublication($data, $researchId)
    {

        $publicationData = ['research_id' => $researchId, 'description' => $data['description']];
        $publication = $this->researchPublicationRepository->save($publicationData);
        if (array_key_exists('attachments', $data)) $this->savePublicationAttachments($publication->id, $data);


        //Save workflow
        $featureName = Config::get('rms.research_feature_name');;
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $workflowData = [
            'feature_id' => $feature->id,
            'rule_master_id' => $feature->workflowRuleMaster->id,
            'ref_table_id' => $researchId,
            'message' => $data['message'],
        ];

        $this->workflowService->createWorkflow($workflowData);

        return true;
    }

    public function updatePublicationForReInitialize($data, $publicationId)
    {

        $publicationData = ['research_id' => $data['research_id'], 'description' => $data['description']];
        $publication = $this->researchPublicationRepository->findOne($publicationId);
        $status = $publication->update($publicationData);

        if (isset($data['fileRepeater'])) {

            $this->deleteOldAttachment($data, $publication);
            $this->storeNewAttachment($data, $publication);
        } else {
            $publication->attachments()->whereResearchPublicationId($publicationId)->delete();
        }
        return true;
    }

    public function deleteOldAttachment($data, $publication)
    {

        $oldFiles = array_column($data['fileRepeater'], 'oldFiles');
        if (count($oldFiles) > 0) {
            foreach ($publication->attachments as $attachment) {
                if (in_array($attachment->id, $oldFiles)) {
                    continue;
                } else {
                    $attachment->delete();
                }
            }
            return true;
        }else{
            $publication->attachments()->whereResearchPublicationId($publication->id)->delete();
        }

    }

    public function storeNewAttachment($data, $publication)
    {
        $files = array_column($data['fileRepeater'], 'file');
        foreach ($files as $file) {
            $ext = $file->getClientOriginalExtension();
            $filePath = $this->upload($file, 'research_publications');
            $publication->attachments()->create([
                'path' => $filePath,
                'name' => $file->getClientOriginalName(),
                'ext' => $ext,
            ]);
        }
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



//    private function updatePublicationAttachments($publicationId, $attachments)
//    {
//        $publication = $this->researchPublicationRepository->findOne($publicationId);
//
//    }
}
