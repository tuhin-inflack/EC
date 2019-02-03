<?php

namespace App\Entities\monthlyUpdate;

use Illuminate\Database\Eloquent\Model;
use Modules\PMS\Entities\ProjectProposal;
use Modules\RMS\Entities\ResearchProposalSubmission;
use App\Entities\monthlyUpdate\MonthlyUpdateAttachment;


class MonthlyUpdate extends Model
{
    protected $fillable = [
        'monthly_updateable_id',
        'monthly_updateable_type',
        'date',
        'achievement',
        'planning',
        'tasks'
    ];

    public function attachments()
    {
        return $this->hasMany(MonthlyUpdateAttachment::class, 'monthly_update_id');
    }
}

