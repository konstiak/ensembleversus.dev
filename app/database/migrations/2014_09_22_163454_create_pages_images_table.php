<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('url');			
			$table->string('thumbnail_url');
			$table->string('path');
			$table->string('thumbnail_path');
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
		Schema::drop('pages_images');
	}

}
