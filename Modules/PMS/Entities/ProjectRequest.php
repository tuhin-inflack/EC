<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $fillable = ['title','end_date','remarks', 'status'];
    protected $table = 'project_requests';

    public function projectRequestAttachments()
    {
        return $this->hasMany(ProjectRequestAttachment::class, 'project_request_id', 'id');
    }

    public function projectRequestReceivers()
    {
        return $this->hasMany(ProjectRequestReceiver::class, 'project_request_id', 'id');
    }
}
