<?php
use Illuminate\Database\Seeder;
use App\Models\User_App_Suck;

class SuckTableSeeder extends Seeder {

	public function run()
	{
		User_App_Suck::create([
			'id'			=> '1',
			'u_id'  		=> '1',
			'a_id'			=> '789'
		]);

	}
}