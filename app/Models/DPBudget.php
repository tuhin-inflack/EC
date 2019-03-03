<?php
/**
 * Created by PhpStorm.
 * User: shomrat
 * Date: 3/3/19
 * Time: 11:59 AM
 */

namespace App\Models;


class DPBudget
{
    public $unitRate;
    public $quantity;
    public $govSource;
    public $ownFinancingSource;
    public $otherSource;
    public $totalExpense;

    /**
     * DPPStander constructor.
     *
     * @param $unitPrice
     * @param $quantity
     * @param $govSource
     * @param $ownFinancingSource
     * @param $otherSource
     * @param $totalExpense
     */
    public function __construct()
    {
        $this->unitRate = 0;
        $this->quantity = 0;
        $this->govSource = 0;
        $this->ownFinancingSource = 0;
        $this->otherSource = 0;
        $this->totalExpense = 0;
    }

}