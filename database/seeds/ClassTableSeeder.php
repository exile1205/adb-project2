<?php
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassTableSeeder extends Seeder {

	public function run()
	{
		Classes::create([
			'id'  		=> '1',
			'name'		=> 'NSString',
			'framework'	=> 'String',
			'topic'		=> 'Text',
			'subtopic'	=> 'Text'
		]);
		Classes::create([
			'id'  		=> '2',
			'name'		=> 'NSURL',
			'framework'	=> 'URL',
			'topic'		=> 'Internet',
			'subtopic'	=> 'Internet'
		]);
		Classes::create([
			'id'  		=> '3',
			'name'		=> 'iAd',
			'framework'	=> 'advertisement',
			'topic'		=> 'advertisement',
			'subtopic'	=> 'advertisement'
		]);
		Classes::create([
			'id'  		=> '4',
			'name'		=> 'UIView',
			'framework'	=> 'View',
			'topic'		=> 'access device view',
			'subtopic'	=> 'device view'
		]);
		Classes::create([
			'id'  		=> '5',
			'name'		=> 'UnkonwnView',
			'framework'	=> 'Unknown',
			'topic'		=> 'Just Test',
			'subtopic'	=> 'i do not bye'
		]);

	}
}