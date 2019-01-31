<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskAttachments extends Model
{
    use SoftDeletes;

    protected $table = 'task_attachments';
    protected $fillable = ['task_id', 'path', 'name', 'ext'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
