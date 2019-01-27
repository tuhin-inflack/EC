<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectResearchUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_research_update', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('update_for_id');
            $table->tinyInteger('month');
            $table->integer('year');
            $table->text('achievements');
            $table->text('plannings');
            $table->string('tasks')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('project_research_update');
    }
}