<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('url')->nullable();
			$table->string('extension')->nullable();
			$table->integer('subject_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('files');
	}
}