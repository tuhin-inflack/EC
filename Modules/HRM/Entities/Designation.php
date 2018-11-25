<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model {
	protected $table = "designations";
	protected $fillable = ['name', 'short_name'];
}
