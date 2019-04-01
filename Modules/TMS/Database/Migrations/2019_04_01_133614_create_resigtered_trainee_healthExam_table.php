<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResigteredTraineeHealthExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resigtered_trainee_healthExam', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trainee_id');
            $table->string('present_deseases')->nullable();
            $table->string('physical_disability')->nullable();
            $table->double('temperature');
            $table->double('pulse');
            $table->double('respiration');
            $table->string('conjunctiva');
            $table->string('oral_cavity');
            $table->string('denture');
            $table->tinyInteger('blood_pressure');
            $table->tinyInteger('anaemia');
            $table->tinyInteger('oedema');
            $table->string('heart');
            $table->string('lung');
            $table->string('abdomen');
            $table->string('eye_sight');
            $table->string('left_eye');
            $table->string('right_eye');
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
        Schema::dropIfExists('resigtered_trainee_healthExam');
    }
}
