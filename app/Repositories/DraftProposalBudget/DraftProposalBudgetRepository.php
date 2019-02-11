<?php
/**
 * Created by PhpStorm.
 * User: Tanvir
 * Date: 2/4/19
 * Time: 3:35 PM
 */

namespace App\Repositories\DraftProposalBudget;


use App\Entities\DraftProposalBudget\DraftProposalBudget;
use App\Repositories\AbstractBaseRepository;

class DraftProposalBudgetRepository extends AbstractBaseRepository
{
    protected $modelName = DraftProposalBudget::class;
}