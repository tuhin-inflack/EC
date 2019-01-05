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

        $trainingTitle = ['কীটনাশক ব্যবহার প্রশিক্ষণ', 'সম্পদ ব্যবস্থাপনা প্রশিক্ষণ', 'বার্ষিক হিসাবরক্ষণ প্রশিক্ষণ', 'মানব সম্পদ উন্নয়ন প্রশিক্ষণ'];

        for ($i = 0; $i < 4; $i++)
        {
            $trainingId  = "BARD-TRN-" . date('Y-m-s') . rand(9999,100000);

            Trainings::create([
                'training_id' => $trainingId,
                'training_title' => $trainingTitle[$i],
                'start_date' => Carbon::today(),
                'end_date' => Carbon::today()->addDays(5),
                'no_of_trainee' => rand(2, 5),
                'status' => 1
            ]);
        }

    }
}
