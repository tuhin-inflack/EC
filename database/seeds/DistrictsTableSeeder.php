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
                'name' => 'কুমিল্লা',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
                array (
                    'id' => 2,
                    'division_id' => 2,
                    'name' => 'ঢাকা',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
        ));
        
        
    }
}