<?php

use Illuminate\Database\Seeder;

class ResearchProposalSubmissionAttachmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research_proposal_submission_attachments')->delete();
        
        \DB::table('research_proposal_submission_attachments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'submissions_id' => 1,
                'attachments' => 'research-submissions/ft2ySvXZjd1xsvOmI67MnUGVv3jPkWIPonnw4j5E.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 22:05:02',
                'updated_at' => '2019-02-07 22:05:02',
            ),
            1 => 
            array (
                'id' => 2,
                'submissions_id' => 2,
                'attachments' => 'research-submissions/zdvuL5Io5xaSkZdZTJuyoWrvH6EWTNUSgNtwExdN.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 22:06:17',
                'updated_at' => '2019-02-07 22:06:17',
            ),
            2 => 
            array (
                'id' => 3,
                'submissions_id' => 1,
                'attachments' => 'research-submissions/4Di8UAbx7uUZfJZ8fRSye5NlLNFaDZgtSOH6mOYF.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 22:07:41',
                'updated_at' => '2019-02-07 22:07:41',
            ),
            3 => 
            array (
                'id' => 4,
                'submissions_id' => 3,
                'attachments' => 'research-submissions/S1nViMBEhroriRnvlyFg7OcUERJcthyXCB3OKlS9.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 22:08:36',
                'updated_at' => '2019-02-07 22:08:36',
            ),
            4 => 
            array (
                'id' => 5,
                'submissions_id' => 1,
                'attachments' => 'research-submissions/bggjgYPPA3VdR2rp6wGP4Vob7x4wAD70kBd0sspM.pdf',
                'file_name' => '2nd.pdf',
                'created_at' => '2019-02-07 22:09:19',
                'updated_at' => '2019-02-07 22:09:19',
            ),
        ));
        
        
    }
}