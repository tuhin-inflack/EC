<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Sample project',
                'submitted_by' => 8,
                'status' => 'pending',
                'duration' => '2 year',
                'budget' => '20000',
                'created_at' => '2019-04-10 11:55:50',
                'updated_at' => '2019-04-10 11:55:50',
            ),
        ));
        
        
    }
}