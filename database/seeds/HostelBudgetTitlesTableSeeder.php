<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\HM\Entities\HostelBudgetTitle;

class HostelBudgetTitlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */


    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $data = [
            [
                'name' => '2015 July - 2016 Jun',
                'current_year' => '2015',
            ],
            [
                'name' => '2016 July - 2017 Jun',
                'current_year' => '2016'
            ],
            [
                'name' => '2017 July - 2018 Jun',
                'current_year' => '2017'
            ],
            [
                'name' => '2018 July - 2019 Jun',
                'current_year' => '2018'
            ],
            [
                'name' => '2019 July - 2020 Jun',
                'current_year' => '2019'
            ],
            [
                'name' => '2020 July - 2021 Jun',
                'current_year' => '2020'
            ],
            [
                'name' => '2021 July - 2022 Jun',
                'current_year' => '2021'
            ],
            [
                'name' => '2022 July - 2023 Jun',
                'current_year' => '2022'
            ],
            [
                'name' => '2023 July - 2024 Jun',
                'current_year' => '2023'
            ],
            [
                'name' => '2024 July - 2025 Jun',
                'current_year' => '2024'
            ],
            [
                'name' => '2025 July - 2026 Jun',
                'current_year' => '2025'
            ],
            [
                'name' => '2026 July - 2027 Jun',
                'current_year' => '2026'
            ],
            [
                'name' => '2027 July - 2028 Jun',
                'current_year' => '2027'
            ],
            [
                'name' => '2028 July - 2029 Jun',
                'current_year' => '2028'
            ],
            [
                'name' => '2029 July - 2030 Jun',
                'current_year' => '2029'
            ],
            [
                'name' => '2030 July - 2031 Jun',
                'current_year' => '2030'
            ],
        ];

        foreach ($data as $item) {
            $item['status'] = 0;
            \DB::table('hostel_budget_titles')->insert(($item));
        }
    }


}