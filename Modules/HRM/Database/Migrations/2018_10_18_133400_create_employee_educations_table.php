<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_educations', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id');
            $table->string('institute_name');
            $table->string('degree_name');
            $table->string('department');
            $table->year('passing_year')->nullable();
            $table->string('medium')->comment('Bengali, English etc')->nullable();
            $table->string('duration')->nullable();
            $table->string('result');
            $table->string('achievement')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_educations');
    }
}
