<?php

use Illuminate\Database\Seeder;

class FiscalYearsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fiscal_years')->delete();
        
        
        
    }
}