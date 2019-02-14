<?php

namespace App\Entities\DraftProposalBudget;

use Illuminate\Database\Eloquent\Model;

class DraftProposalBudgetFiscalValue extends Model
{
    protected $fillable = ['budget_id', 'fiscal_year', 'monetary_amount', 'body_percentage', 'project_percentage'];

    public function budget(){
        return $this->belongsTo(DraftProposalBudget::class, 'budget_id');
    }
}
