<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('research_id');
            $table->unsignedInteger('economy_code_id');
            $table->enum('section_type', ['revenue', 'capital', 'physical_contingency', 'price_contingency'])->default('revenue');
            $table->string('unit', 20);
            $table->double('unit_rate', 10, 2);
            $table->integer('quantity');
            $table->double('total_expense', 10, 2);
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
        Schema::dropIfExists('research_budgets');
    }
}
