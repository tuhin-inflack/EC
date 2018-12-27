<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    protected $table = 'trainings';

    protected $fillable = ['training_id','training_title', 'start_date','end_date', 'no_of_trainee', 'status', 'created_at', 'updated_at'];
}
