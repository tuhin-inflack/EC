<?php

use Illuminate\Database\Seeder;

class ProjectRequestReceiversTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_request_receivers')->delete();
        
        \DB::table('project_request_receivers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_request_id' => 1,
                'receiver' => 1,
                'created_at' => '2019-02-07 21:42:50',
                'updated_at' => '2019-02-07 21:42:50',
            ),
        ));
        
        
    }
}