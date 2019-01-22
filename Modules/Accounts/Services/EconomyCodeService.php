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
}