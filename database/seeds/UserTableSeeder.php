<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'u_id'  		=> '1',
			'u_name'		=> 'Tester',
			'u_email'		=> 'hello@gmail.com',
			'u_password'	=> Hash::make('abc123')
		]);

	}
}