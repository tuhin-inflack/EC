<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingGuestInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_guest_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_booking_id');
            $table->string('name', 50);
            $table->unsignedInteger('age');
            $table->enum('gender', ['male', 'female']);
            $table->string('relation');
            $table->string('nid');
            $table->string('nid_doc');
            $table->string('address');
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
        Schema::dropIfExists('booking_guest_infos');
    }
}