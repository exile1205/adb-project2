<?php
use Illuminate\Database\Seeder;
use App\Models\User_App_Suck;

class SuckTableSeeder extends Seeder {

	public function run()
	{
		$app_list = ['590246583', '471851341', '300311831', '309601447', '431244201', '494813494', '596650556', '540360389', '377194688', '562136065', '388358640', '431218690', '582904365', '414706506', '438865278', '739573002', '422689480', '516561342', '281796108', '420009108'];

		User_App_Suck::create([
			'id'			=> '1',
			'u_id'  		=> '1',
			'a_id'			=> '789'
		]);

	}
}