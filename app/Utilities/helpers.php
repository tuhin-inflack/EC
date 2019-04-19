<?php

use Illuminate\Support\Facades\Auth;
use Modules\PMS\Entities\ProjectRequest;
use Modules\PMS\Entities\ProjectRequestDetail;
use Modules\RMS\Entities\ResearchRequest;
use Modules\RMS\Entities\ResearchDetailInvitation;

if (! function_exists('in_designation')) {
    /**
     * Check Is Designation Matched
     *
     * @param expecting the short codes of Designation in a comma separated manner
     * @return mixed
     *
     * @uses in_designation('DG', 'DA', 'PD')
     */
    function in_designation()
    {
        $haystack = func_get_args();
        $result = 0;

        if (Auth::user()->user_type == 'Employee'){
            $needle = Auth::user()->employee->designation->short_name;
            $result = in_array($needle, $haystack) ? 1 : 0;
        }

        return $result;
    }
}

if(!function_exists('can_submit_brief_project_proposal'))
{
    /**
     * Checks whether current logged in user can submit a brief project proposal or not.
     * @param ProjectRequest $projectRequest
     * @return bool
     */
    function can_submit_brief_project_proposal(ProjectRequest $projectRequest)
    {
        return in_array(auth()->user()->id, $projectRequest->projectRequestReceivers->pluck('receiver')->toArray());
    }
}

if(!function_exists('can_submit_brief_research_proposal'))
{
    /**
     * Checks whether current logged in user can submit a brief research proposal or not.
     * @param ResearchRequest $researchRequest
     * @return bool
     */
    function can_submit_brief_research_proposal(ResearchRequest $researchRequest)
    {
        return in_array(auth()->user()->id, $researchRequest->researchRequestReceivers->pluck('to')->toArray());
    }
}

if(!function_exists('can_submit_detail_project_proposal'))
{
    /** Checks whether current logged in user can submit a detail project proposal or not.
     * @param ProjectRequestDetail $projectRequestDetail
     * @return bool
     */
    function can_submit_detail_project_proposal(ProjectRequestDetail $projectRequestDetail)
    {
        return (auth()->user()->id == $projectRequestDetail->projectApprovedProposal->auth_user_id);
    }
}

if(!function_exists('can_submit_detail_research_proposal'))
{
    /**
     * Checks whether current logged in user can submit a detail project proposal or not.
     * @param ResearchDetailInvitation $researchDetailInvitation
     * @return bool
     */
    function can_submit_detail_research_proposal(ResearchDetailInvitation $researchDetailInvitation)
    {
        return (auth()->user()->id == $researchDetailInvitation->researchApprovedProposal->auth_user_id);
    }
}