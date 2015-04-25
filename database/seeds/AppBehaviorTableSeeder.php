<?php
use Illuminate\Database\Seeder;
use App\Models\App_Behavior;

class AppBehaviorTableSeeder extends Seeder {

	public function run()
	{
		App_Behavior::create([
			'id'			=> '1',
			'a_id'  		=> '123',
			'b_id'			=> '1',
			'score'			=> '0.75'
		]);

		App_Behavior::create([
			'id'			=> '2',
			'a_id'  		=> '123',
			'b_id'			=> '2',
			'score'			=> '0.66'
		]);

		App_Behavior::create([
			'id'			=> '3',
			'a_id'  		=> '123',
			'b_id'			=> '4',
			'score'			=> '0.88'
		]);

		App_Behavior::create([
			'id'			=> '4',
			'a_id'  		=> '456',
			'b_id'			=> '2',
			'score'			=> '0.12'
		]);

		App_Behavior::create([
			'id'			=> '5',
			'a_id'  		=> '456',
			'b_id'			=> '3',
			'score'			=> '0.23'
		]);

		App_Behavior::create([
			'id'			=> '6',
			'a_id'  		=> '456',
			'b_id'			=> '5',
			'score'			=> '0.8'
		]);

		App_Behavior::create([
			'id'			=> '7',
			'a_id'  		=> '789',
			'b_id'			=> '1',
			'score'			=> '0.2'
		]);
		App_Behavior::create([
			'id'			=> '8',
			'a_id'  		=> '789',
			'b_id'			=> '3',
			'score'			=> '0.4'
		]);
		App_Behavior::create([
			'id'			=> '9',
			'a_id'  		=> '789',
			'b_id'			=> '5',
			'score'			=> '0.2'
		]);
	}
}