<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['division_id', 'name'];

    public function thanas()
    {
        return $this->hasMany(Thana::class, 'district_id');
    }


    //belongs to a Thana
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');

    }
}
