<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_personal_info', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('title')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('job_joining_date')->nullable();
            $table->date('current_position_joining_date')->nullable();
            $table->date('current_position_expire_date')->nullable();
            $table->integer('salary_scale')->nullable();
            $table->integer('total_salary')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('number_of_children')->nullable();

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
        Schema::dropIfExists('employee_personal_info');
    }
}
