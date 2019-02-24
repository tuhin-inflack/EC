<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['division_id', 'name'];

    public function thanas()
    {
        return $this->hasMany(Thana::class, 'district_id');
    }
}
