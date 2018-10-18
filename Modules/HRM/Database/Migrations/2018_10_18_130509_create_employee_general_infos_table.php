<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeGeneralInfosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'employee_general_info', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' )->nullable();
			$table->string('email')->nullable();
			$table->enum( 'gender', [ 'male', 'female', 'Both' ] )->nullable();
			$table->unsignedInteger('department_id')->nullable();
			$table->unsignedInteger('designation_id')->nullable();
			$table->enum( 'status', [ 'present', 'leave' ] )->nullable();
			$table->integer('tel_office')->nullable();
			$table->integer('tel_home')->nullable();
			$table->integer('mobile_one')->nullable();
			$table->integer('mobile_two')->nullable();
			$table->timestamps();
			$table->softDeletes();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'employee_general_info' );
	}
}
