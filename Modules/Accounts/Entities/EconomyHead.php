<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class EconomyHead extends Model
{
    protected $fillable = ['parent_id', 'code', 'english_name', 'bangla_name', 'description'];

    public function economyCode()
    {
        return $this->hasMany(EconomyCode::class, 'economy_head_id');
    }
}
