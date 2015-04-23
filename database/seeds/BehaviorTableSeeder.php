<?php
use Illuminate\Database\Seeder;
use App\Models\Behavior;

class BehaviorTableSeeder extends Seeder {

	public function run()
	{
		Behavior::create([
			'b_id'  		=> '1',
			'b_name'		=> 'Play Game'
		]);
		Behavior::create([
			'b_id'  		=> '2',
			'b_name'		=> 'Take Picture'
		]);
		Behavior::create([
			'b_id'  		=> '3',
			'b_name'		=> 'Screen'
		]);
		Behavior::create([
			'b_id'  		=> '4',
			'b_name'		=> 'Location Access'
		]);
		Behavior::create([
			'b_id'  		=> '5',
			'b_name'		=> 'Connect Internet'
		]);

	}
}