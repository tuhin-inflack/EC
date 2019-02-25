<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name'];

    public function districts()
    {
        return $this->hasMany(District::class, 'division_id');
    }
}
