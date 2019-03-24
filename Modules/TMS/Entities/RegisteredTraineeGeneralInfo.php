<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisteredTraineeGeneralInfo extends Model
{
    protected $fillable = ['trainee_id', 'fathers_name', 'mothers_name', 'birth_place', 'marital_status', 'present_address'];
    protected $table = 'registered_trainee_generalInfos';

}
