<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->longText('body')->nullable();
			$table->integer('category_id');
			    $table->integer('subjectable_id');

    $table->string("subjectable_type");
		});
	}

	public function down()
	{
		Schema::drop('subjects');
	}
}