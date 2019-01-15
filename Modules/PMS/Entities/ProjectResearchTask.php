<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectResearchTask extends Model
{
    use SoftDeletes;

    protected $table= 'project_research_tasks';
    protected $fillable = ['task_id', 'task_for_id', 'type', 'expected_start_time', 'expected_end_time', 'start_time', 'end_time', 'description'];

    public function attachments()
    {
        return $this->hasMany(ProjectResearchAttachment::class);
    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }

}
