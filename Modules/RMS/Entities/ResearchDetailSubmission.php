<?php

namespace Modules\RMS\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class ResearchDetailSubmission extends Model
{
    protected $table = 'research_detail_submissions';
    protected $fillable = ['research_detail_invitation_id', 'auth_user_id', 'title', 'status'];


    public function researchDetailSubmissionAttachment()
    {
        return $this->hasMany(ResearchDetailSubmissionAttachment::class, 'research_detail_submission_id', 'id');
    }

    public function researchDetailInvitation()
    {

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'auth_user_id', 'id');
    }
}
