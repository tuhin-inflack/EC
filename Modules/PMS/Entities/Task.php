<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
