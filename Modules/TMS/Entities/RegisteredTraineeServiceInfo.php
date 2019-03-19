<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisteredTraineeServiceInfo extends Model
{
    protected $fillable = ['trainee_id', 'designation', 'organization', 'service_code', 'joining_date', 'experience', 'address'];
    protected $table = 'registered_trainee_service';
}
