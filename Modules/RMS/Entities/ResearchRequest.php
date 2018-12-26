<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchRequest extends Model
{
    protected $fillable = ['to','title','end_date','remarks','attachment'];
    protected $table = 'research_requests';
}
