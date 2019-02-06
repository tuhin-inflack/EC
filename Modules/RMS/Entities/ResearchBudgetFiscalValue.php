<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchBudgetFiscalValue extends Model
{
    protected $fillable = ['research_budget_id', 'fiscal_year', 'monetary_amount', 'body_percentage', 'research_percentage'];

    public function researchBudget(){
        return $this->belongsTo(ResearchBudget::class, 'research_budget_id');
    }
}
