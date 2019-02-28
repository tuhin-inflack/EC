<?php
/**
 * Created by PhpStorm.
 * User: Tanvir
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace App\Services\DraftProposalBudget;

use App\Entities\DraftProposalBudget\DraftProposalBudgetFiscalValue;
use App\Repositories\DraftProposalBudget\DraftProposalBudgetRepository;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class DraftProposalBudgetService
{
    use CrudTrait;

    private $draftProposalBudgetRepository;
    private $featureService;
    private $workflowService;

    /**
     * ProjectRequestService constructor.
     *
     * @param DraftProposalBudgetRepository $draftProposalBudgetRepository
     * @param FeatureService $featureService
     * @param WorkflowService $workflowService
     */

    public function __construct(DraftProposalBudgetRepository $draftProposalBudgetRepository,FeatureService $featureService,
                                WorkflowService $workflowService)
    {
        $this->draftProposalBudgetRepository = $draftProposalBudgetRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;

        $this->setActionRepository($draftProposalBudgetRepository);

    }

    public function getSectionTypesOfDraftProposalBudget(){
        return [
            'revenue' => Lang::get('draft-proposal-budget.revenue'),
            'capital' => Lang::get('draft-proposal-budget.capital'),
            'physical_contingency' => Lang::get('draft-proposal-budget.physical_contingency'),
            'price_contingency' => Lang::get('draft-proposal-budget.price_contingency'),
        ];
    }

    /**
     * @param $budgetable
     * @return array
     */
    public function prepareBudgetView($budgetable)
    {
        $totalExpense = 0;
        $physicalContingencyExpense = 0;
        $priceContingencyExpense = 0;

        foreach ($budgetable->budgets as $budget)
        {
            if(!in_array(['physical_contingency', 'price_contingency'], [$budget->section_type])){
                $totalExpense += $budget->total_expense;
            }
        }

        foreach ($budgetable->budgets as $budget)
        {
            if ($budget->section_type === 'physical_contingency'){
                $physicalContingencyExpense = $budget->total_expense ? : ( $totalExpense * $budget->total_expense_percentage ) / 100 ;
            }

            if($budget->section_type === 'price_contingency'){
                $priceContingencyExpense = $budget->total_expense ? : ( $totalExpense * $budget->total_expense_percentage ) / 100 ;
            }
        }

//        dd($project->budgets);
//        echo "<pre>";
//
//        echo $totalExpense; echo "<br>";
//        echo $physicalContingencyExpense; echo "<br>";
//        echo $priceContingencyExpense; echo "<br>";
        $grandTotalExpense = $totalExpense + $physicalContingencyExpense + $priceContingencyExpense;
//
//        echo "</pre>";

        return [
            'totalExpense' => $totalExpense,
            'physicalContingencyExpense' => $physicalContingencyExpense,
            'priceContingencyExpense' => $priceContingencyExpense,
            'grandTotalExpense' => $grandTotalExpense,
        ];

    }

    /**
     * @param $budgetable
     * @param array $data
     * @return mixed
     */
    public function store($budgetable, array $data)
    {
        return DB::transaction(function () use ($budgetable, $data) {

            $draftProposalBudget = $budgetable->budgets()->create($data);

            foreach ($data['fiscal_year'] as $key => $budgetFiscalYear) {

                if ($budgetFiscalYear){

                    $fiscalValue = new DraftProposalBudgetFiscalValue([
                        'budget_id' => $draftProposalBudget->id,
                        'fiscal_year' => $budgetFiscalYear,
                        'monetary_amount' => $data['monetary_amount'][$key],
                        'monetary_percentage' => $data['monetary_percentage'][$key],
                    ]);

                    $draftProposalBudget->budgetFiscalValue()->save($fiscalValue);
                }
            }

            return $draftProposalBudget;
        });
    }

    public function updateBudget(array $data, $draftProposalBudget)
    {
        return DB::transaction(
            function () use ($data, $draftProposalBudget) {

            $this->update($draftProposalBudget, $data);

            $draftProposalBudget->budgetFiscalValue()->delete();

            foreach ($data['fiscal_year'] as $key => $budgetFiscalYear) {

                if ($budgetFiscalYear){
                    $fiscalValue = new DraftProposalBudgetFiscalValue([
                        'budget_id' => $draftProposalBudget->id,
                        'fiscal_year' => $budgetFiscalYear,
                        'monetary_amount' => $data['monetary_amount'][$key],
                    ]);
                }

                $draftProposalBudget->budgetFiscalValue()->save($fiscalValue);
            }

            return $draftProposalBudget;
        });
    }

}
