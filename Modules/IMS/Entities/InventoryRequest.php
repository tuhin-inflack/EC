<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryRequest extends Model
{
    protected $fillable = ['title', 'request_type', 'from_location_id', 'to_location_id', 'requester_id', 'receiver_id','status'];

    public function details()
    {
        return $this->hasMany(InventoryRequestDetail::class, 'inventory_request_id', 'id');
    }
}
