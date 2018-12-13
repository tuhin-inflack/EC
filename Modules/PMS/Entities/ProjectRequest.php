<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $fillable = ['send_to','end_date','message','status'];
    protected $table = 'project_requests';

    public function projectRequestImages()
    {
        return $this->hasMany(ProjectRequestImage::class,'request_id','id');
    }
}
