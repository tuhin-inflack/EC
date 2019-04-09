<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends Model
{
    use SoftDeletes;

    protected $fillable = ['training_id', 'trainee_first_name', 'trainee_last_name', 'trainee_gender', 'email', 'mobile', 'status', 'deleted_at', 'bangla_name', 'english_name', 'dob', 'phone', 'fax', 'photo'];

    protected $table = 'trainees';

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function generalInfos()
    {
        return $this->hasOne(RegisteredTraineeGeneralInfo::class, 'trainee_id', 'id');
    }

    public function services()
    {
        return $this->hasOne(RegisteredTraineeServiceInfo::class, 'trainee_id', 'id');
    }

    public function emergencyContacts()
    {
        return $this->hasOne(RegisteredTraineeEmergency::class, 'trainee_id', 'id');
    }

    public function educations()
    {
        return $this->hasOne(RegisteredTraineeEducation::class, 'trainee_id', 'id');
    }

    public function physicalInfos()
    {
        return $this->hasOne(RegisteredTraineePhysicalInfo::class, 'trainee_id', 'id');
    }

    public function healthExaminations()
    {
        return $this->hasOne(RegisteredTraineeHealthExam::class, 'trainee_id', 'id');
    }
}
