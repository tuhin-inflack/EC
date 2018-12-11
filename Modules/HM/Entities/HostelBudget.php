<?php

namespace Modules\HM\Entities;

use Illuminate\Database\Eloquent\Model;

class HostelBudget extends Model
{
    protected $fillable = [
    	'title',
	    'section',
    	'hostel_budget_title_id',
	    'hostel_budget_section_id',
	    'budget_amount',
	    'budget_approved_amount'
    ];
}
