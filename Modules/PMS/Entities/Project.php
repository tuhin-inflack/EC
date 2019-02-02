<?php

namespace Modules\PMS\Entities;

use App\Entities\Organization\Organization;
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
}
