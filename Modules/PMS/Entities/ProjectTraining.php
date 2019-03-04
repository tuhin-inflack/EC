<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTraining extends Model
{
    protected $fillable = ['title', 'project_id'];
    protected $table = 'project_training';

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id' );
    }
}
