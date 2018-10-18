<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_publications', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id')->nullable();
            $table->string('type_of_publication')->nullable();
            $table->string('author_name')->nullable();
            $table->string('publication_title')->nullable();
            $table->string('publication_company')->nullable();
            $table->string('publication_company_location')->nullable();
            $table->string('published_date')->nullable();
            $table->string('source_link')->nullable();
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
        Schema::dropIfExists('employee_publications');
    }
}
