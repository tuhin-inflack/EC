<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class EconomyCode extends Model
{
    protected $fillable = ['code', 'english_name', 'bangla_name', 'description', 'economy_head_id'];

    public function economyHead()
    {
        return $this->belongsTo(EconomyHead::class, 'economy_head_id');
    }
}
