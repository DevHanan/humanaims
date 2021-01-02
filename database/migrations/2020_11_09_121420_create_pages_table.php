<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title_ar', 255)->nullable();
			$table->string('title_en', 255)->nullable();
			$table->longText('body_ar')->nullable();
			$table->longText('body_en')->nullable();
			$table->string('image')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}
}