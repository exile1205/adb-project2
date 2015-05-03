<?php
use Illuminate\Database\Seeder;
use App\Models\User_App_Suck;
use App\Models\App;
use App\Models\User;

class SuckTableSeeder extends Seeder {

	public function run()
	{
		$app_list = ['471851341', '300311831', '309601447', '431244201', '494813494', '596650556', '540360389', '377194688', '562136065', '388358640', '431218690', '582904365', '414706506', '438865278', '739573002', '422689480', '516561342', '281796108', '420009108'];
		$special_app = '590246583';

		//special_part
		$sp_user_list = User::orderByRaw("RAND()")->take(35)->lists('id');

		foreach ($sp_user_list as $sp_key => $sp_value) {
			User_App_Suck::create([
				'u_id'  		=> $sp_value,
				'a_id'			=> $special_app
			]);
		}
		//other_app_part
		foreach ($app_list as $app_key => $app_value) {
			$randNum = rand(10,30);
			$user_list = User::orderByRaw("RAND()")->take($randNum)->lists('id');
			foreach ($user_list as $u_key => $u_value) {
				User_App_Suck::create([
					'u_id'			=> $u_value,
					'a_id'			=> $app_value
				]);
			}
		}

	}
}