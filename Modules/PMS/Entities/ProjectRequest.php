<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $fillable = ['send_to','end_date','title','message','attachment','status'];

    public function requestForwards()
    {
        return $this->hasMany('Modules\PMS\Entities\ProjectRequestForward');
    }
}
