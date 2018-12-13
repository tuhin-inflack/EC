<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectProposal extends Model
{
    protected $table = 'project_proposals';

    protected $fillable = ['title','remarks','status'];

    public function projectProposalFiles()
    {
        return $this->hasMany(ProjectProposalFile::class,'proposal_id','id');
    }
}
