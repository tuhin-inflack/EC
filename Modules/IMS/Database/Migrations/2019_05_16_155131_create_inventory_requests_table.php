<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('request_type', ['requisition', 'transfer', 'scrap', 'abandon'])->default('requisition');
            $table->integer('from_location_id');
            $table->integer('to_location_id');
            $table->integer('requester_id');
            $table->integer('receiver_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
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
        Schema::dropIfExists('inventory_requests');
    }
}
