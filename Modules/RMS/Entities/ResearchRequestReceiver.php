<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchRequestReceiver extends Model
{
    protected $table = 'research_request_receivers';
    protected $fillable = ['to', 'research_request_id'];
}
