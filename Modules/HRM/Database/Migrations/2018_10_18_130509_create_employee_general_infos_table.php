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
		Schema::create( 'employees', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'first_name' );
			$table->string( 'last_name' )->nullable();
			$table->string('email')->unique();
			$table->enum( 'gender', [ 'male', 'female', 'Both' ] );
			$table->unsignedInteger('department_id');
			$table->string('designation_code');
			$table->enum( 'status', [ 'present', 'leave' ] )->default('present');
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
		Schema::dropIfExists( 'employees' );
	}
}
