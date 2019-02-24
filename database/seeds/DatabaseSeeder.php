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
//        $this->call(UsersTableSeeder::class);
//        $this->call(WorkflowSeeder::class);
        $this->call(AcademicDegreeTableSeeder::class);
        $this->call(AcademicDepartmentsTableSeeder::class);
        $this->call(AcademicInstitutesTableSeeder::class);
        $this->call(AccountHeadsTableSeeder::class);
        $this->call(AccountLedgersTableSeeder::class);
        $this->call(AttributeValuesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(BookingCheckinTableSeeder::class);
        $this->call(BookingGuestInfosTableSeeder::class);
        $this->call(BookingRequestForwardsTableSeeder::class);
        $this->call(BookingRoomInfosTableSeeder::class);
        $this->call(CheckinDetailsTableSeeder::class);
        $this->call(CheckinPaymentsTableSeeder::class);
        $this->call(CheckinRoomTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(EconomyCodesTableSeeder::class);
        $this->call(EmployeeEducationsTableSeeder::class);
        $this->call(EmployeePersonalInfoTableSeeder::class);
        $this->call(EmployeePublicationsTableSeeder::class);
        $this->call(EmployeeResearchInfoTableSeeder::class);
        $this->call(EmployeeTrainingsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(HostelBudgetSectionsTableSeeder::class);
        $this->call(HostelBudgetTitlesTableSeeder::class);
        $this->call(HostelBudgetsTableSeeder::class);
        $this->call(HostelRoomTypeRatesTableSeeder::class);
        $this->call(HostelsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(MonthlyUpdateAttachmentsTableSeeder::class);
        $this->call(MonthlyUpdatesTableSeeder::class);
        $this->call(NotificationTypesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(OrganizablesTableSeeder::class);
        $this->call(OrganizationMembersTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ProjectProposalFilesTableSeeder::class);
        $this->call(ProjectProposalsTableSeeder::class);
        $this->call(ProjectRequestAttachmentsTableSeeder::class);
        $this->call(ProjectRequestForwardTableSeeder::class);
        $this->call(ProjectRequestReceiversTableSeeder::class);
        $this->call(ProjectRequestsTableSeeder::class);
        $this->call(ProjectResearchTasksTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(RemarksTableSeeder::class);
        $this->call(ResearchTableSeeder::class);
        $this->call(ResearchProposalDateExtendRequestsTableSeeder::class);
        $this->call(ResearchProposalSubmissionAttachmentsTableSeeder::class);
        $this->call(ResearchProposalSubmissionsTableSeeder::class);
        $this->call(ResearchRequestAttachmentsTableSeeder::class);
        $this->call(ResearchRequestReceiversTableSeeder::class);
        $this->call(ResearchRequestsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoomBookingRefereesTableSeeder::class);
        $this->call(RoomBookingRequestersTableSeeder::class);
        $this->call(RoomBookingsTableSeeder::class);
        $this->call(RoomInventoriesTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(TaskAttachmentsTableSeeder::class);
        $this->call(TaskCommentsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(TraineesTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(WorkflowConversationsTableSeeder::class);
        $this->call(WorkflowDetailsTableSeeder::class);
        $this->call(WorkflowMastersTableSeeder::class);
        $this->call(WorkflowRuleDetailsTableSeeder::class);
        $this->call(WorkflowRuleMastersTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
    }
}
