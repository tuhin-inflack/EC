<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomBookingRequestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_booking_requesters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_booking_id');
            $table->string('name', 50);
            $table->enum('gender', ['male', 'female']);
            $table->string('contact');
            $table->string('email', 50);
            $table->integer('nid');
            $table->string('passport');
            $table->string('organization');
            $table->string('designation');
            $table->enum('organization_type', ['government', 'private', 'foreign', 'others']);
            $table->string('photo');
            $table->string('nid_doc');
            $table->string('passport_doc');
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
        Schema::dropIfExists('room_booking_requesters');
    }
}
