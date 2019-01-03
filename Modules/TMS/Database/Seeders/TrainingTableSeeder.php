<?php

namespace Modules\TMS\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\TMS\Entities\Trainings;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $words = ['Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet'];
        $max = count($words) - 1;

        for ($i = 0; $i < 10; $i++)
        {
            $trainingId  = "BARD-TRN-" . date('Y-m-s') . rand(9999,100000);

            Trainings::create([
                'training_id' => $trainingId,
                'training_title' => $words[rand(0, $max)],
                'start_date' => Carbon::today(),
                'end_date' => Carbon::today()->addDays(5),
                'no_of_trainee' => rand(5, 30),
                'status' => 0
            ]);
        }

    }
}
