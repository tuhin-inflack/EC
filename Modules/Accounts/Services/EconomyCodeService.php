<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/24/18
 * Time: 7:31 PM
 */

namespace Modules\Accounts\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Lang;
use Modules\Accounts\Repositories\EconomyCodeRepository;

class EconomyCodeService
{
    use CrudTrait;

    protected $economyCodeRepository;

    /**
     * AccountHeadServices constructor.
     * @param EconomyCodeRepository $economyCodeRepository
     */
    public function __construct(EconomyCodeRepository $economyCodeRepository)
    {
        $this->economyCodeRepository = $economyCodeRepository;
        $this->setActionRepository($this->economyCodeRepository);
    }

    /**
     * <h3>Economy Codes</h3>
     * <p>Custom Implementation of concatenation</p>
     *
     * @param Null | Callable $implementedValue Anonymous Implementation of Value
     * @param Null | Callable $implementedKey Anonymous Implementation Key index
     * @param bool $emptyOption
     * @return array
     */
    public function getEconomyCodesForDropdown($implementedValue = null, $implementedKey = null, $emptyOption = false)
    {
        $economyCodes = $this->actionRepository->findAll();

        $economyCodeOptions = [];

        if ($emptyOption) $economyCodeOptions[0] = Lang::trans('labels.select');

        foreach ($economyCodes as $economyCode) {
            $economyCodeKey = $implementedKey ? $implementedKey($economyCode) : $economyCode->id;

            $implementedValue = $implementedValue ? : function($economyCode) {
                return $economyCode->code . ' - ' . $economyCode->bangla_name;
            };

            $economyCodeOptions[$economyCodeKey] = $implementedValue($economyCode);
        }

        return $economyCodeOptions;
    }
}