<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('AppTableSeeder');
		$this->call('BehaviorTableSeeder');
		$this->call('ClassTableSeeder');
		$this->call('AppBehaviorTableSeeder');
		$this->call('AppBehaviorClassTableSeeder');
		$this->call('CommentTableSeeder');
		$this->call('SuckTableSeeder');
	}

}
