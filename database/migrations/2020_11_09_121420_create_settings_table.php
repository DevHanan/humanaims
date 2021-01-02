<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('site_name_ar')->nullable();
			$table->string('site_name_en')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('youtube')->nullable();
			$table->string('instagram')->nullable();
			$table->string('email')->nullable();
			$table->string('andriod', 255)->nullable();
			$table->string('ios')->nullable();
						$table->integer('verify_expire_time')->default(30);

		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}