<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchBudgetFiscalValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_budget_fiscal_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('research_budget_id');
            $table->string('fiscal_year');
            $table->double('monetary_amount', 10, 2);
            $table->double('body_percentage', 8, 2);
            $table->double('research_percentage', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_budget_fiscal_values');
    }
}
