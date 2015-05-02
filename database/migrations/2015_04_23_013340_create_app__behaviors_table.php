<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppBehaviorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app__behaviors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('a_id',9);
			$table->integer('b_id')->unsigned();
			$table->float('score');
			$table->timestamps();
		});

		Schema::table('app__behaviors',function($table)
		{

			$table->foreign('a_id')->references('id')->on('apps');
			$table->foreign('b_id')->references('id')->on('behaviors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app__behaviors');
	}

}
