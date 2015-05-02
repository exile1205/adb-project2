<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apps', function(Blueprint $table)
		{
			$table->string('id',9)->unique();
			$table->string('name');
			$table->string('genre',20);
			$table->float('rating');
			$table->string('description');
			$table->integer('rating_users');
			$table->string('arm',10);
			$table->string('img_url');
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
		Schema::drop('apps');
	}

}
