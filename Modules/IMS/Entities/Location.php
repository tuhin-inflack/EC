<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Department;

class Location extends Model
{
    protected $fillable = ['name', 'department_id', 'type', 'description'];
    protected $table = 'locations';

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
