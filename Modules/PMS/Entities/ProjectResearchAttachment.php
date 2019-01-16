<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectResearchAttachment extends Model
{
    use SoftDeletes;

    protected $table = 'project_research_attachments';
    protected $fillable = ['project_research_task_id', 'file_name', 'file_ext', 'file_path'];

    public function projectResearchTask()
    {
        return $this->belongsTo(ProjectResearchTask::class);
    }
}
