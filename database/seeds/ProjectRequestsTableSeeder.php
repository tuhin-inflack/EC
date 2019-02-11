<?php

use Illuminate\Database\Seeder;

class ProjectRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_requests')->delete();
        
        \DB::table('project_requests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Project invitation',
                'end_date' => '2019-03-08',
                'remarks' => 'Please check this',
                'created_at' => '2019-02-07 21:42:50',
                'updated_at' => '2019-02-07 21:42:50',
            ),
        ));
        
        
    }
}