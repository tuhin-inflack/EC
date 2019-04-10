<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EconomyHeadsTableSeeder::class);
        $this->call(EconomyCodesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(NotificationTypesTableSeeder::class);
        $this->call(ShareRulesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WorkflowRuleMastersTableSeeder::class);
        $this->call(WorkflowRuleDetailsTableSeeder::class);
        $this->call(ShareRulesDesignationSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ThanasTableSeeder::class);
        $this->call(UnionsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(HostelsTableSeeder::class);
    }
}
