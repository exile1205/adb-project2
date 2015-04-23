<?php
use Illuminate\Database\Seeder;
use App\Models\App_Behavior_Class;

class AppBehaviorClassTableSeeder extends Seeder {

	public function run()
	{
		App_Behavior_Class::create([
			'id'			=> '1',
			'a_id'  		=> '123',
			'b_id'			=> '1',
			'c_id'			=> '1'
		]);
		App_Behavior_Class::create([
			'id'			=> '2',
			'a_id'  		=> '123',
			'b_id'			=> '1',
			'c_id'			=> '4'
		]);

	}
}