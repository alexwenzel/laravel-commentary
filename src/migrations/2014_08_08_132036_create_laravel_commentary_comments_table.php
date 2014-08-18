<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaravelCommentaryCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravel-commentary-comments', function($table)
		{
			$table->bigIncrements('id');
			$table->string('name', 200);
			$table->string('email', 200);
			$table->text('text');
			$table->string('entity', 200)->index();
			$table->tinyInteger('status')->default(0)->unsigned();
			$table->softDeletes();
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
		Schema::drop('laravel-commentary-comments');
	}

}
