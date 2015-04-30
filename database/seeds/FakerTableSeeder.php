<?php
use Illuminate\Database\Seeder;
use App\Models\App;
use Faker\Factory as Faker;

class FakerTableSeeder extends Seeder {

	public function run()
	{
		$cate = ['Productivity','Finance','Travel','Business','Utilities'];
		$faker = Faker::create();
		foreach(range(200,220) as $index){
			App::create([
					'id' => $index,
	                'name' => $faker->word,
	                'rating' =>$faker->numberBetween($min = 2, $max = 5),
	                'rating_users' => $faker->numberBetween($min = 5, $max = 20000),
	                'genre' => $cate[rand(0,4)],
	                'arm' => 'armv7',
	                'description'=> $faker->sentence,
	                'img_url' => $faker->imageUrl($width = 60, $height = 60)
	            ]);
		}
	}
}