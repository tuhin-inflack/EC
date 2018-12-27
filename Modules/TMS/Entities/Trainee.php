<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $table = 'trainees';

    protected $fillable = ['training_id', 'trainee_first_name', 'trainee_last_name', 'trainee_gender', 'email', 'mobile', 'status', 'deleted_at'];
}
