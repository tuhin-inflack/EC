<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $fillable = ['location_id', 'inventory_item_category_id', 'quantity' ];
}
