<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class EconomyCode extends Model
{
    protected $fillable = ['code', 'english_name', 'bangla_name', 'description', 'visible'];
}
