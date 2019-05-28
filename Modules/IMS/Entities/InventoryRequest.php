<?php

namespace Modules\IMS\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class InventoryRequest extends Model
{
    protected $fillable = ['title', 'request_type', 'from_location_id', 'to_location_id', 'requester_id', 'receiver_id', 'status'];

    public function details()
    {
        return $this->hasMany(InventoryRequestDetail::class, 'inventory_request_id', 'id');
    }

    public function requester()
    {
        return $this->hasOne( User::class, 'id', 'requester_id');
    }

    public function receiver()
    {
        return $this->hasOne( User::class, 'id', 'receiver_id');
    }

    public function fromLocation()
    {
        return $this->hasOne(InventoryLocation::class, 'id', 'from_location_id');
    }

    public function toLocation()
    {
        return $this->hasOne(InventoryLocation::class, 'id', 'to_location_id');
    }
}
