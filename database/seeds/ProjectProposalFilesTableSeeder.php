<?php

use Illuminate\Database\Seeder;

class ProjectProposalFilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_proposal_files')->delete();
        
        \DB::table('project_proposal_files')->insert(array (
            0 => 
            array (
                'id' => 1,
                'proposal_id' => 1,
                'attachments' => 'project-submissions/HAZFHYz5OBEuakdKaf7URyCd5dnjWyHEHvwBuPv2.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 21:43:14',
                'updated_at' => '2019-02-07 21:43:14',
            ),
            1 => 
            array (
                'id' => 2,
                'proposal_id' => 2,
                'attachments' => 'project-submissions/BWjqSrT5Zh2g3qoYkLToWXP7J5nEGC2gNwhu7LjH.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 21:44:58',
                'updated_at' => '2019-02-07 21:44:58',
            ),
            2 => 
            array (
                'id' => 3,
                'proposal_id' => 3,
                'attachments' => 'project-submissions/zxpDQPDE1YehpT6HTIRpUPtK8bNFePI774PXF1sH.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 21:48:19',
                'updated_at' => '2019-02-07 21:48:19',
            ),
        ));
        
        
    }
}