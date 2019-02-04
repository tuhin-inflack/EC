<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectBudgetFiscalValue extends Model
{
    protected $fillable = ['project_budget_id', 'monetary_amount', 'body_percentage', 'project_percentage'];

    public function projectBudget(){
        return $this->belongsTo(ProjectBudget::class, 'project_budget_id');
    }
}