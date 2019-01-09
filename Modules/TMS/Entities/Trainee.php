<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends Model
{
    use SoftDeletes;

    protected $table = 'trainees';

    protected $fillable = ['training_id', 'trainee_first_name', 'trainee_last_name', 'trainee_gender', 'email', 'mobile', 'status', 'deleted_at'];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
