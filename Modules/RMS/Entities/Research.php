<?php

namespace Modules\RMS\Entities;

use App\Entities\Organization\Organization;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Modules\PMS\Entities\Task;

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
        return $this->morphMany(Task::class, 'taskable');
    }
}
