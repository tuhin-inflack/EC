<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:57 PM
 */

namespace Modules\RMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\RMS\Entities\ResearchProposalSubmission;

class ResearchProposalSubmissionRepository extends AbstractBaseRepository
{
    protected $modelName = ResearchProposalSubmission::class;
}