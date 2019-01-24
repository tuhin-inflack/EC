<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectResearchUpdate extends Model
{
    protected $table = 'project_research_monthly_update';
    protected $fillable = ['month', 'year', 'achievements', 'plannings', 'tasks'];
}
