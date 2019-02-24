<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = ['district_id', 'name'];

    public function unions()
    {
        return $this->hasMany(Union::class, 'thana_id');
    }
}
