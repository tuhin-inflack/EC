<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryRequest extends Model
{
    use SoftDeletes;

    protected $fillable = ['from_location_id', 'to_location_id', 'quantity' ];

    public function detail()
    {
        return $this->hasMany(InventoryRequestDetail::class, 'inventory_request_id', 'id');
    }
}
