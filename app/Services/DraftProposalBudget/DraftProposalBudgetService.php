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
use App\Traits\CrudTrait;
use App\Traits\ExcelExportTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use stdClass;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class DraftProposalBudgetService
{
    use CrudTrait, ExcelExportTrait;

    private $draftProposalBudgetRepository;
    private $featureService;

    /**
     * ProjectRequestService constructor.
     *
     * @param DraftProposalBudgetRepository $draftProposalBudgetRepository
     * @param FeatureService $featureService
     */

    public function __construct(DraftProposalBudgetRepository $draftProposalBudgetRepository,FeatureService $featureService)
    {
        $this->draftProposalBudgetRepository = $draftProposalBudgetRepository;
        $this->featureService = $featureService;

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

    public function getEconmonyCodeWiseSortedBudgets($budgetable){
        return $budgetable->budgets()->orderBy('economy_code_id', 'asc')->get();
    }

    /**
     * @param $budgetable
     * @return array
     */
    public function prepareBudgetView($budgetable)
    {
        $revenueExpense = 0;
        $capitalExpense = 0;
        $physicalContingencyExpense = 0;
        $priceContingencyExpense = 0;

        foreach ($budgetable->budgets as $budget)
        {
            switch ($budget->section_type){
                case 'revenue':
                    $revenueExpense += $budget->total_expense;
                    break;
                case 'capital':
                    $capitalExpense += $budget->total_expense;
                    break;
            }
        }

        $totalExpense = $revenueExpense + $capitalExpense;

        foreach ($budgetable->budgets as $budget)
        {
            switch ($budget->section_type){
                case 'physical_contingency':
                    $physicalContingencyExpense = $budget->total_expense ? : ( $totalExpense * $budget->total_expense_percentage ) / 100 ;
                    break;
                case 'price_contingency':
                    $priceContingencyExpense = $budget->total_expense ? : ( $totalExpense * $budget->total_expense_percentage ) / 100 ;
                    break;
            }
        }

        $grandTotalExpense = $totalExpense + $physicalContingencyExpense + $priceContingencyExpense;

        $economyHeadWiseRevenueData = $this->getEconomyCodeWiseSubTotal($budgetable, 'revenue');
        $economyHeadWiseCapitalData = $this->getEconomyCodeWiseSubTotal($budgetable, 'capital');

        return compact('totalExpense',
            'revenueExpense',
            'capitalExpense',
            'physicalContingencyExpense',
            'priceContingencyExpense',
            'grandTotalExpense',
            'economyHeadWiseRevenueData',
            'economyHeadWiseCapitalData'
        );

    }

    private function getEconomyCodeWiseSubTotal($budgetable, $sectionType){

        $totalBasedOnEconomyCode = array();

        foreach ($budgetable->budgets as $budget){
            if($budget->section_type === $sectionType) {

                if(!isset($totalBasedOnEconomyCode[$budget->economyCode->economyHead->code])){
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code] = new stdClass;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->unitRate = 0;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->quantity = 0;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->govSource = 0;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->ownFinancingSource = 0;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->otherSource = 0;
                    $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->totalExpense = 0;
                }

                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->unitRate += $budget->unit_rate;
                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->quantity += $budget->quantity;
                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->govSource += $budget->gov_source;
                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->ownFinancingSource += $budget->own_financing_source;
                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->otherSource += $budget->other_source;
                $totalBasedOnEconomyCode[$budget->economyCode->economyHead->code]->totalExpense += $budget->total_expense;
            }
        }

        return $totalBasedOnEconomyCode;
    }

    /**
     * Export View as a Excel File
     * @param $data
     * @param $viewName
     * @param null $fileName
     * @return BinaryFileResponse
     */
    public function exportExcel($data, $viewName, $fileName = null)
    {
        $fileName = $fileName ? $fileName . '.xlsx' : 'DPPBudget.xlsx';
        return $this->downloadExcel($data, $viewName, $fileName);
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
                        'monetary_percentage' => $data['monetary_percentage'][$key],
                    ]);
                }

                $draftProposalBudget->budgetFiscalValue()->save($fiscalValue);
            }

            return $draftProposalBudget;
        });
    }

}
