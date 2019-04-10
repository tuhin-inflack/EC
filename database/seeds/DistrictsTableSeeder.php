<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'division_id' => 1,
                'name' => 'Chottogram',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}