<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 10/24/18
 * Time: 7:31 PM
 */

namespace Modules\Accounts\Services;


use App\Traits\CrudTrait;
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
     * @return array
     */
    public function getEconomyCodesForDropdown($implementedValue = null, $implementedKey = null)
    {
        $economyCodes = $this->actionRepository->findAll();

        $economyCodeOptions = [];

        foreach ($economyCodes as $economyCode) {
            $economyCodeKey = $implementedKey ? $implementedKey($economyCode) : $economyCode->id;

            $implementedValue = $implementedValue ? : function() use($economyCode) {
                return $economyCode->code . ' - ' . $economyCode->bangla_name;
            };

            $economyCodeOptions[$economyCodeKey] = $implementedValue($economyCode);
        }

        return $economyCodeOptions;
    }
}