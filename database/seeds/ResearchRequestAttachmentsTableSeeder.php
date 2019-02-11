<?php

use Illuminate\Database\Seeder;

class ResearchRequestAttachmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('research_request_attachments')->delete();
        
        \DB::table('research_request_attachments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'research_request_id' => 1,
                'attachments' => 'research-requests/ObQbEgEKknpl87anCAcxwzfcgtm3wsRhCK8lcj3Q.pdf',
                'created_at' => '2019-02-07 22:01:02',
                'updated_at' => '2019-02-07 22:01:02',
                'file_name' => '1st .pdf',
            ),
            1 => 
            array (
                'id' => 2,
                'research_request_id' => 2,
                'attachments' => 'research-requests/HP1wiD0X9m38VYROcCnc3shKr3ygERDxHl1VMGgS.pdf',
                'created_at' => '2019-02-07 22:04:35',
                'updated_at' => '2019-02-07 22:04:35',
                'file_name' => '1st .pdf',
            ),
        ));
        
        
    }
}