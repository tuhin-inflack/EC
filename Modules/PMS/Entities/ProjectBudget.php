<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\EconomyCode;

class ProjectBudget extends Model
{
    protected $fillable = ['project_id', 'economy_code_id', 'section_type', 'unit', 'unit_rate', 'quantity', 'total_expense', 'weight'];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function economyCode(){
        return $this->belongsTo(EconomyCode::class, 'economy_code_id');
    }


    public function budgetFiscalValue(){
        return $this->hasMany(ProjectBudgetFiscalValue::class, 'project_budget_id');
    }
}
