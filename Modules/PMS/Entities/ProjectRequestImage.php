<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequestImage extends Model
{
    protected $fillable = ['request_id','attachment'];
    protected $table = 'project_request_images';
}
