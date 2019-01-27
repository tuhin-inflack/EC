<?php

namespace Modules\RMS\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected  $table = 'research';
    protected $fillable = ['title', 'submitted_by', 'status'];


    public function researchSubmittedByUser()
    {
        return $this->belongsTo(User::class, 'submitted_by', 'id');
    }
}
