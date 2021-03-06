<?php

return [
//    used in HRM
    'gender' => [
        'male' => 'Male',
        'female' => 'Female',
        'both' => 'Both',
    ],
    'employee_available_status' => [
        'present' => 'Present',
        'leave' => 'Leave',
    ],
    'marital_status' => [
        'single' => 'Single',
        'married' => 'Married',
        'separated' => 'Separated',
        'divorced' => 'Divorced'

    ],

    'employee_education_medium' => [
        'bangla' => 'Bangla',
        'english' => 'English'
    ],
//Use in PMS
    'project' => 'project',
    'research' => 'research',

//    USE IN PMS & RMS

    'research_proposal_feature_name' => 'Research Proposal',
    'project_proposal_feature_name' => 'Project Brief Proposal',
    'project_details_proposal_feature_name' => 'Project Details Proposal',

    //Employee Designations short code
    'faculty_member' => 'FM',
    'faculty_director' => 'DM',
    'research_director' => 'RD',
    'initiator' => 'initiator',
    'research_invite_submit' => ['DIRR'],
    'research_proposal_submission' => ['FD'],
    'research_proposal_send_back' => ['FD', 'initiator'],
    'research_proposal_approved' => ['initiator', 'DIRR', 'FD'],
    'research_short_listed' => ['initiator', 'DIRR', 'FD'],
    'research_approved_apc' => ['initiator', 'DIRR', 'FD'],

    // PMS: Keys with recipient list for notification
    'project_invite_submit' => ['PD', 'TaggedPerson'],
    'project_proposal_submission' => ['DIRP', 'TaggedPerson'],
    'project_proposal_review' => ['PD', 'initiator'],
    'project_proposal_send_back' => ['initiator'],
    'project_proposal_apc_approved' => ['initiator', 'PD', 'FD'],
    'project_share_jdp' => ['JDP'],
    'project_share_adp' => ['ADP'],
];
