<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'id'  		=> '1',
			'name'		=> 'Tester',
			'email'		=> 'hello@gmail.com',
			'password'	=> Hash::make('abc123')
		]);

	}
}