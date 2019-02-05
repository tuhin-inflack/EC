<?php

namespace Modules\RMS\Entities;

use App\Entities\monthlyUpdate\MonthlyUpdate;
use App\Entities\Organization\Organization;
use App\Entities\Task;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected  $table = 'research';
    protected $fillable = ['title', 'submitted_by', 'status'];

    public function organizations()
    {
        return $this->morphToMany(Organization::class, 'organizable');
    }

    public function researchSubmittedByUser()
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

    public function budget()
    {
        return $this->hasMany(ResearchBudget::class, 'research_id');
    }
}
