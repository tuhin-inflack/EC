<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRequestForwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_request_forward', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_request_id')->unsigned();
            $table->string('forward_to');
            $table->timestamps();
        });

        Schema::table('project_request_forward', function($table) {
            $table->foreign('project_request_id')->references('id')->on('project_requests');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_request_forward');
    }
}
