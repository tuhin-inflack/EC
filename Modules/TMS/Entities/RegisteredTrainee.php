<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisteredTrainee extends Model
{
    protected $fillable = ['training_id', 'bangla_name', 'english_name', 'gender', 'dob', 'email', 'mobile', 'phone', 'fax', 'photo'];
    protected $table = 'registered_trainees';
}
