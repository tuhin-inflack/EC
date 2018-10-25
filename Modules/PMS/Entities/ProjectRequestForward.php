<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequestForward extends Model
{
    public $table = 'project_request_forward';
    protected $fillable = ['project_request_id','forward_to'];
}
