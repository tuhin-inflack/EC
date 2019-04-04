<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequestDetail extends Model
{
    protected $table = 'project_request_details';
    protected $fillable = ['title','end_date','remarks'];
}
