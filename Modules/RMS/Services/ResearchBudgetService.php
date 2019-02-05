<?php
/**
 * Created by PhpStorm.
 * User: tanvir
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\RMS\Services;

use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Modules\PMS\Entities\ProjectBudgetFiscalValue;
use Modules\RMS\Repositories\ResearchBudgetRepository;


class ResearchBudgetService
{
    use CrudTrait;

    private $researchBudgetRepository;
    private $featureService;
    private $workflowService;

    /**
     * ProjectRequestService constructor.
     *
     * @param ResearchBudgetRepository $researchBudgetRepository
     * @param FeatureService $featureService
     * @param WorkflowService $workflowService
     */

    public function __construct(ResearchBudgetRepository $researchBudgetRepository,FeatureService $featureService,
                                WorkflowService $workflowService)
    {
        $this->researchBudgetRepository = $researchBudgetRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;

        $this->setActionRepository($researchBudgetRepository);

    }

    public function getSectionTypesOfResearchBudget(){
        return [
            'revenue' => Lang::get('rms::research_budget.revenue'),
            'capital' => Lang::get('rms::research_budget.capital'),
            'physical_contingency' => Lang::get('rms::research_budget.physical_contingency'),
            'price_contingency' => Lang::get('rms::research_budget.price_contingency'),
        ];
    }

    public function store(array $data, $project)
    {
        return DB::transaction(function () use ($data) {

            $projectBudget = $this->save($data);

            foreach ($data['fiscal_year'] as $key => $budgetFiscalValue) {

                if ($budgetFiscalValue){
                    $fiscalValue = new ProjectBudgetFiscalValue([
                        'project_budget_id' => $projectBudget->id,
                        'fiscal_year' => $budgetFiscalValue,
                        'monetary_amount' => $data['monetary_amount'][$key],
                        'body_percentage' => $data['body_percentage'][$key],
                        'project_percentage' => $data['project_percentage'][$key],
                    ]);
                }

                $projectBudget->budgetFiscalValue()->save($fiscalValue);
            }

            return $projectBudget;
        });
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
