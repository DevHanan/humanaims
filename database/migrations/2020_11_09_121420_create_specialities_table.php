<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialitiesTable extends Migration {

	public function up()
	{
		Schema::create('specializations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_ar', 255)->nullable();
			$table->string('name_en')->nullable();
			$table->integer('parent_id')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('specializations');
	}
}