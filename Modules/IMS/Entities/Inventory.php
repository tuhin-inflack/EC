<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $fillable = ['location_id', 'inventory_item_category_id', 'quantity' ];

    public function inventoryLocations()
    {
        return $this->belongsTo(InventoryLocation::class, 'location_id', 'id');
    }

    public function inventoryItemCategory()
    {
        return $this->belongsTo(InventoryItemCategory::class, 'inventory_item_category_id', 'id');
    }
}
