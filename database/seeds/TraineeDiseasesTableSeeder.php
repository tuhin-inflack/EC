<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraineeDiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainee_diseases')->delete();

        DB::table('trainee_diseases')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Hypertension',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Diabetis Mellitus',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Bronchial asthma',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'IHD',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Migraine',
                    'created_at' => '2019-02-07 21:30:06',
                    'updated_at' => '2019-02-07 21:30:06',
                ),
        ));
    }
}
