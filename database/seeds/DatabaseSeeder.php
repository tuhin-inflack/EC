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
        $this->call(AcademicDepartmentsTableSeeder::class);
        $this->call(EconomyCodesTableSeeder::class);
        $this->call(EconomyHeadsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(NotificationTypesTableSeeder::class);
        $this->call(ProjectProposalFilesTableSeeder::class);
        $this->call(ProjectProposalsTableSeeder::class);
        $this->call(ProjectRequestAttachmentsTableSeeder::class);
        $this->call(ProjectRequestForwardTableSeeder::class);
        $this->call(ProjectRequestReceiversTableSeeder::class);
        $this->call(ProjectRequestsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ResearchRequestAttachmentsTableSeeder::class);
        $this->call(ResearchRequestReceiversTableSeeder::class);
        $this->call(ResearchRequestsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(WorkflowRuleDetailsTableSeeder::class);
        $this->call(WorkflowRuleMastersTableSeeder::class);
        $this->call(ShareRulesSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(ShareRulesDesignationSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(ThanasTableSeeder::class);
        $this->call(UnionsTableSeeder::class);
    }
}
