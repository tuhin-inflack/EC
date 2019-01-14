<?php

namespace Modules\TMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\TMS\Entities\Trainee;

class TraineeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $traineeFirstNames = ['মোহাম্মদ', 'মোহাম্মদ', 'মোহাম্মদ', 'ইয়া হাসিব মোহাম্মদ', 'মোহাম্মদ', 'সাহিব বিন', 'মোহাম্মদ' ];
        $traineeLastNames = ['আবদুস সাত্তার', 'জাহাঙ্গীর আলম', 'আবু তালেব', 'আবু বকর সিদ্দীক', 'সাদমান আহমেদ', 'মাহবুব', 'সুমন'];

        for($i = 0; $i < count($traineeFirstNames); $i++)
        {
            Trainee::create([
                'training_id' => rand(1,3),
                'trainee_first_name' => $traineeFirstNames[$i],
                'trainee_last_name' => $traineeLastNames[$i],
                'trainee_gender' => 'male',
                'email' => '',
                'mobile' => '017'.rand(12345678, 99999999),
                'status' => 1
            ]);
        }
        // $this->call("OthersTableSeeder");
    }
}

