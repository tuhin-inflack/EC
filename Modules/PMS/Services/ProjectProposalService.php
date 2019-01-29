<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
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
    private $featureService;
    private $workflowService;

    /**
     * ProjectRequestService constructor.
     * @param ProjectProposalRepository $projectProposalRepository
     */

    public function __construct(ProjectProposalRepository $projectProposalRepository,
                                FeatureService $featureService,
                                WorkflowService $workflowService)
    {
        $this->projectProposalRepository = $projectProposalRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;
        $this->setActionRepository($this->projectProposalRepository);
    }

    public function getAll()
    {
        return $this->projectProposalRepository->findAll();
    }

    public function store(array $data)
    {
        $proposal = $this->projectProposalRepository->save($data);

        // Initiating Workflow
        $featureName = config('constants.project_proposal_feature_name');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $workflowData = [
            'feature_id' => $feature->id,
            'rule_master_id' => $feature->workflowRuleMaster->id,
            'ref_table_id' => $proposal->id,
            'message' => "",
        ];
        $this->workflowService->createWorkflow($workflowData);
        // Workflow initiate done

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
