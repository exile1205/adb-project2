<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAppCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user__app__comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('u_id')->unsigned();
			$table->string('a_id');
			$table->string('u_a_comment');
			$table->timestamps();

		});

		Schema::table('user__app__comments', function($table)
		{
			$table->foreign('u_id')->references('u_id')->on('users');
			$table->foreign('a_id')->references('a_id')->on('apps');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user__app__comments');
	}

}
