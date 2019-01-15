<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = ['task_name'];

    public function projectResearchTask()
    {
        return $this->belongsTo(ProjectResearchTask::class);
    }
}
