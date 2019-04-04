<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchDetailInvitation extends Model
{
    protected $fillable = ['title','end_date','remarks', 'status'];
    protected $table = 'research_requests';

}
