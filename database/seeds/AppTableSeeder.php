<?php
use Illuminate\Database\Seeder;
use App\Models\App;

class AppTableSeeder extends Seeder {

	public function run()
	{
		App::create([
			'id'  		=> '123',
			'name'		=> 'SosLab App',
			'genre'		=> 'Music',
			'rating'		=> '4.5',
			'rating_users'=> '45',
			'arm'			=> 'armv7',
			'img_url'		=> 'http://is1.mzstatic.com/image/pf/us/r30/Purple5/v4/12/3d/be/123dbee0-d119-f4e5-a843-9392dcecf51f/AppIcon60x60_U00402x.png'
		]);
		App::create([
			'id'  		=> '456',
			'name'		=> 'ICTLab App',
			'genre'		=> 'Games',
			'rating'		=> '2',
			'rating_users'=> '23',
			'arm'			=> 'armv7',
			'img_url'		=> 'http://is3.mzstatic.com/image/pf/us/r30/Purple7/v4/19/dd/7b/19dd7bc0-ae03-d82d-f183-d66e74fb5f1c/Icon-Production.png'
		]);
		App::create([
			'id'  		=> '789',
			'name'		=> 'KMLab App',
			'genre'		=> 'Sports',
			'rating'		=> '4',
			'rating_users'=> '12',
			'arm'			=> 'armv7',
			'img_url'		=> 'http://is4.mzstatic.com/image/pf/us/r30/Purple7/v4/16/35/5e/16355e45-6fbd-f871-5903-d6a53a53eeb2/ProductionAppIcon57x57.png'
		]);

	}
}