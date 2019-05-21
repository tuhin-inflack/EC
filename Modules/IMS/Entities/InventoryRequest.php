<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryRequest extends Model
{
    protected $fillable = ['title', 'type', 'from_location_id', 'to_location_id', 'status'];

    public function detail()
    {
        return $this->hasMany(InventoryRequestDetail::class, 'inventory_request_id', 'id');
    }
}
