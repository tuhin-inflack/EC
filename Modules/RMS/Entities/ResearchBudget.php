<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\EconomyCode;

class ResearchBudget extends Model
{
    protected $fillable = ['research_id', 'economy_code_id', 'section_type', 'unit', 'unit_rate', 'quantity', 'total_expense'];

    public function research(){
        return $this->belongsTo(Research::class, 'research_id');
    }

    public function economyCode(){
        return $this->belongsTo(EconomyCode::class, 'economy_code_id');
    }

    public function budgetFiscalValue(){
        return $this->hasMany(ResearchBudgetFiscalValue::class, 'research_budget_id');
    }
}
