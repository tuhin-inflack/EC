<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMonetaryPercentageSizeInDraftProposalBudgetFiscalValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draft_proposal_budget_fiscal_values', function (Blueprint $table) {
            $table->double('monetary_percentage', 5, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draft_proposal_budget_fiscal_values', function (Blueprint $table) {
            $table->double('monetary_percentage', 3, 2)->nullable()->change();
        });
    }
}
