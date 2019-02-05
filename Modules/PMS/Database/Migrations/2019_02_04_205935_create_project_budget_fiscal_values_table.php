<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectBudgetFiscalValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_budget_fiscal_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_budget_id');
            $table->string('fiscal_year');
            $table->double('monetary_amount', 10, 2);
            $table->double('body_percentage', 8, 2);
            $table->double('project_percentage', 8, 2);
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
        Schema::dropIfExists('project_budget_fiscal_values');
    }
}
