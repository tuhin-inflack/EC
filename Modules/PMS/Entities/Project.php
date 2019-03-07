<?php

namespace Modules\PMS\Entities;

use App\Entities\Attribute;
use App\Entities\DraftProposalBudget\DraftProposalBudget;
use App\Entities\monthlyUpdate\MonthlyUpdate;
use App\Entities\Organization\Organization;
use App\Entities\Task;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected  $table = 'projects';
    protected $fillable = ['title', 'submitted_by', 'status'];

    public function organizations()
    {
        return $this->morphToMany(Organization::class, 'organizable');
    }

    public function projectSubmittedByUser()
    {
        return $this->belongsTo(User::class, 'submitted_by', 'id');
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable', 'taskable_type', 'taskable_id', 'id');
    }

    public function monthlyUpdates()
    {
        return $this->morphMany(MonthlyUpdate::class, 'monthly_updatable');
    }

    public function budgets()
    {
        return $this->morphMany(DraftProposalBudget::class, 'budgetable', 'budgetable_type', 'budgetable_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'project_id');
    }

    public function projectTrainings()
    {
        return $this->hasMany(ProjectTraining::class);
    }
}
