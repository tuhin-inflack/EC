<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryRequest extends Model
{
    use SoftDeletes;

    protected $table = 'inventory_requests';
    protected $fillable = ['location_id', 'inventory_item_category_id', 'quantity' ];

    public function detail()
    {
        return $this->hasOne(InventoryRequestDetail::class, 'inv_req_id', 'id');
    }
}
