<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->char('originalPath');
			$table->char('smallPath');
			$table->char('mediumPath');
			$table->char('largePath');
			$table->char('originalLongPath');
			$table->char('smallLongPath');
			$table->char('mediumLongPath');
			$table->char('largeLongPath');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
