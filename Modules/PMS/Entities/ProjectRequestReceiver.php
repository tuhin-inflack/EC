<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequestReceiver extends Model
{
    protected $fillable = ['project_request_id', 'receiver'];
    protected $table = "project_request_receivers";
}
