<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attributes')->delete();
        
        \DB::table('attributes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Deposit',
                'unit' => 'tk',
                'created_at' => '2019-04-10 11:55:50',
                'updated_at' => '2019-04-10 11:55:50',
                'project_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Loan',
                'unit' => 'tk',
                'created_at' => '2019-04-10 11:55:50',
                'updated_at' => '2019-04-10 11:55:50',
                'project_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Share',
                'unit' => 'share',
                'created_at' => '2019-04-10 11:55:50',
                'updated_at' => '2019-04-10 11:55:50',
                'project_id' => 1,
            ),
        ));
        
        
    }
}