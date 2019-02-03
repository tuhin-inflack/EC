<?php

namespace Modules\PMS\Entities;

use App\Constants\AbstractTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RMS\Entities\Research;

Relation::morphMap([
   AbstractTask::ProjectType => Project::class,
   AbstractTask::ResearchType => Research::class
]);

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'expected_start_time',
        'expected_end_time',
        'start_time',
        'end_time',
        'description',
        'taskable_id',
        'taskable_type',
    ];

    public function attachments()
    {
        return $this->hasMany(TaskAttachments::class, 'task_id', 'id');
    }
}
