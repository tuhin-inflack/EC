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
use Modules\RMS\Entities\ResearchBudgetFiscalValue;
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

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {

            $researchBudget = $this->save($data);

            foreach ($data['fiscal_year'] as $key => $budgetFiscalYear) {

                if ($budgetFiscalYear){
                    $fiscalValue = new ResearchBudgetFiscalValue([
                        'research_budget_id' => $researchBudget->id,
                        'fiscal_year' => $budgetFiscalYear,
                        'monetary_amount' => $data['monetary_amount'][$key],
                        'body_percentage' => $data['body_percentage'][$key],
                        'research_percentage' => $data['research_percentage'][$key],
                    ]);
                }

                $researchBudget->budgetFiscalValue()->save($fiscalValue);
            }

            return $researchBudget;
        });
    }

    public function updateBudget(array $data, $research, $researchBudget)
    {
        return DB::transaction(
            function () use ($data, $research, $researchBudget) {

                $this->update($researchBudget, $data);

                $researchBudget->budgetFiscalValue()->delete();

                foreach ($data['fiscal_year'] as $key => $budgetFiscalYear) {

                    if ($budgetFiscalYear){
                        $fiscalValue = new ResearchBudgetFiscalValue([
                            'research_budget_id' => $researchBudget->id,
                            'fiscal_year' => $budgetFiscalYear,
                            'monetary_amount' => $data['monetary_amount'][$key],
                            'body_percentage' => $data['body_percentage'][$key],
                            'research_percentage' => $data['research_percentage'][$key],
                        ]);
                    }

                    $researchBudget->budgetFiscalValue()->save($fiscalValue);
                }

                return $researchBudget;
            });
    }

}
