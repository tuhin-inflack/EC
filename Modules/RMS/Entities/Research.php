<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected  $table = 'research';
    protected $fillable = ['title', 'submitted_by', 'status'];
}
