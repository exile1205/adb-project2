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
			'img'		=> '/image/user/1.jpg',
			'self_intro'=> 'this is a test',
			'password'	=> Hash::make('abc123')
		]);

	}
}