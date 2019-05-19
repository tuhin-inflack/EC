<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryRequest extends Model
{
    protected $table = 'inventory_requests';
    protected $fillable = ['location_id', 'inventory_item_category_id', 'quantity' ];
}
