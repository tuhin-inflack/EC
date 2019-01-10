<?php

namespace Modules\TMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;

    protected $table = 'trainings';

    protected $fillable = ['training_id','training_title', 'start_date','end_date', 'no_of_trainee', 'status', 'created_at', 'updated_at'];

    public function trainee()
    {
        return $this->hasMany(Trainee::class, 'training_id');
    }
}
