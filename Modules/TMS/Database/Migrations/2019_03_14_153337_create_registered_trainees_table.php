<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('training_id');
            $table->string('bangla_name');
            $table->string('english_name');
            $table->string('gender');
            $table->date('dob');
            $table->string('email');
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('registered_trainees');
    }
}
