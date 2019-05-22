<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryItemCategory extends Model
{
    protected $fillable = ['name','short_code','type','unit'];
    protected $table = 'inventory_item_categories';
}
