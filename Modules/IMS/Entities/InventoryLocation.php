<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Department;

class InventoryLocation extends Model
{
    protected $fillable = ['name', 'department_id', 'type', 'description'];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
