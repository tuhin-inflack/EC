<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'research_publications';

    protected $fillable = ['id', 'research_id', 'description'];
}
