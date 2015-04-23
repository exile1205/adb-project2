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
			$table->string('a_id');
			$table->integer('b_id')->unsigned();
			$table->float('a_b_score');
			$table->timestamps();
		});

		Schema::table('app__behaviors',function($table)
		{

			$table->foreign('a_id')->references('a_id')->on('apps');
			$table->foreign('b_id')->references('b_id')->on('behaviors');
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
