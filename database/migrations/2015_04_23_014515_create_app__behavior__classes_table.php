<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppBehaviorClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app__behavior__classes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('a_id',9);
			$table->integer('b_id')->unsigned();
			$table->integer('c_id')->unsigned();
			$table->timestamps();

		});

		Schema::table('app__behavior__classes',function($table)
		{
			$table->foreign('a_id')->references('id')->on('apps');
			$table->foreign('b_id')->references('id')->on('behaviors');
			$table->foreign('c_id')->references('id')->on('classes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app__behavior__classes');
	}

}
