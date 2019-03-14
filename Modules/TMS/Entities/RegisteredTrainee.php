<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisteredTrainee extends Model
{
    protected $fillable = ['training_id', 'bangla_name', 'english_name', 'gender', 'dob', 'email', 'mobile', 'phone', 'fax', 'photo'];
    protected $table = 'registered_trainees';

    public function generalInfos()
    {
        return $this->hasOne(RegisteredTrainee::class, 'trainee_id', 'id');
    }

    public function services()
    {
        return $this->hasOne(RegisteredTraineeServiceInfo::class, 'trainee_id', 'id');
    }
}
