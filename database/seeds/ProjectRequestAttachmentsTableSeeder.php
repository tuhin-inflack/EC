<?php

use Illuminate\Database\Seeder;

class ProjectRequestAttachmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_request_attachments')->delete();
        
        \DB::table('project_request_attachments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_request_id' => 1,
                'attachments' => 'project-requests/uAIPoBfjwYCL9QmVDOUbTuH3fFVjf0A9iIk7GUSF.pdf',
                'file_name' => '1st .pdf',
                'created_at' => '2019-02-07 21:42:50',
                'updated_at' => '2019-02-07 21:42:50',
            ),
        ));
        
        
    }
}