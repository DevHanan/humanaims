<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('fullname', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('password', 255)->nullable();
			$table->string('image')->nullable();
			$table->integer('country_id');
			$table->enum('gender',['female','male']);
						$table->date('age');
						$table->string('membership');

		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}