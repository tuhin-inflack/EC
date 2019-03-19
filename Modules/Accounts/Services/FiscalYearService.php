<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/24/18
 * Time: 7:31 PM
 */

namespace Modules\Accounts\Services;


use App\Traits\CrudTrait;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Lang;
use Modules\Accounts\Repositories\FiscalYearRepository;

class FiscalYearService
{
    use CrudTrait;

    protected $fiscalYearRepository;


    /**
     * FiscalYearService constructor.
     * @param FiscalYearRepository $fiscalYearRepository
     */
    public function __construct(FiscalYearRepository $fiscalYearRepository)
    {
        $this->fiscalYearRepository = $fiscalYearRepository;
        $this->setActionRepository($fiscalYearRepository);
    }

    public function store(array $data)
    {
        $data['name'] = $this->dateToFiscalYearNameConvert($data['start'], $data['end']);
        $data['start'] = Carbon::parse($data['start']);
        $data['end'] = Carbon::parse($data['end']);
        return $this->save($data);
    }

    public function updateFiscalYear($fiscalYear, array $data)
    {
        $data['name'] = $this->dateToFiscalYearNameConvert($data['start'], $data['end']);
        $data['start'] = Carbon::parse($data['start']);
        $data['end'] = Carbon::parse($data['end']);

        return $this->update($fiscalYear, $data);
    }

    private function dateToFiscalYearNameConvert($startDate, $endDate)
    {
        return date( 'd M, Y', strtotime($startDate)) .' - '. date('d M, Y', strtotime($endDate));
    }

    /**
     * <h3>Fiscal Year</h3>
     * <p>Custom Implementation of concatenation</p>
     *
     * @param Closure $implementedValue Anonymous Implementation of Value
     * @param Closure $implementedKey Anonymous Implementation Key index
     * @param bool $emptyOption
     * @return array
     */
    public function getFiscalYearsForDropdown(Closure $implementedValue = null, Closure $implementedKey = null, $emptyOption = false)
    {
        $fiscalYears = $this->actionRepository->findAll();

        $fiscalYearOptions = [];

        if ($emptyOption) $fiscalYearOptions[0] = Lang::trans('labels.select');

        foreach ($fiscalYears as $fiscalYear) {
            $fiscalYearKey = $implementedKey ? $implementedKey($fiscalYear) : $fiscalYear->id;

            $implementedValue = $implementedValue ? : function($fiscalYear) {
                return $fiscalYear->name;
            };

            $economyHeadOptions[$fiscalYearKey] = $implementedValue($fiscalYear);
        }

        return $fiscalYearOptions;
    }
}