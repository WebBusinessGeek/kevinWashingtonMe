<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillToolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skill_tool', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('skill_id');
			$table->integer('tool_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skill_tool');
	}

}
