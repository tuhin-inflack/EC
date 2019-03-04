<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTraining extends Model
{
    protected $fillable = ['title', 'project_id'];
    protected $table = 'project_training';
}
