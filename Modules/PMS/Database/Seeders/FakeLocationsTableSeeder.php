<?php

namespace Modules\PMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\HRM\Database\Seeders\AcademicInstituteTableSeeder;

class FakeLocationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('divisions')->insert([
            'id' => '1',
            'name' => 'Chottogram',
        ]);


        DB::table('districts')->insert([
            'id' => '1',
            'division_id' => '1',
            'name' => 'Chottogram',
        ]);

        DB::table('thanas')->insert([
            'id' => '1',
            'district_id' => '1',
            'name' => 'Raozan',
        ]);

        DB::table('unions')->insert([
            'id' => '1',
            'thana_id' => '1',
            'name' => 'Test Union',
        ]);
    }
}
