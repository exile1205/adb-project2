<?php
use Illuminate\Database\Seeder;
use App\Models\App;

class AppTableSeeder extends Seeder {

	public function run()
	{
		App::create([
			'a_id'  		=> '123',
			'a_name'		=> 'SosLab App',
			'a_genre'		=> 'Music',
			'a_rating'		=> '4.5',
			'a_rating_users'=> '45',
			'a_arm'			=> 'armv7'
		]);
		App::create([
			'a_id'  		=> '456',
			'a_name'		=> 'ICTLab App',
			'a_genre'		=> 'Games',
			'a_rating'		=> '2',
			'a_rating_users'=> '23',
			'a_arm'			=> 'armv7'
		]);
		App::create([
			'a_id'  		=> '789',
			'a_name'		=> 'KMLab App',
			'a_genre'		=> 'Sports',
			'a_rating'		=> '4',
			'a_rating_users'=> '12',
			'a_arm'			=> 'armv7'
		]);

	}
}