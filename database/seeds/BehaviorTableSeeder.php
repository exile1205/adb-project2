<?php
use Illuminate\Database\Seeder;
use App\Models\Behavior;

class BehaviorTableSeeder extends Seeder {

	public function run()
	{
		Behavior::create([
			'id'  		=> '1',
			'name'		=> 'Play Game'
		]);
		Behavior::create([
			'id'  		=> '2',
			'name'		=> 'Take Picture'
		]);
		Behavior::create([
			'id'  		=> '3',
			'name'		=> 'Screen'
		]);
		Behavior::create([
			'id'  		=> '4',
			'name'		=> 'Location Access'
		]);
		Behavior::create([
			'id'  		=> '5',
			'name'		=> 'Connect Internet'
		]);

	}
}