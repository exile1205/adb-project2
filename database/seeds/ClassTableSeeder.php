<?php
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassTableSeeder extends Seeder {

	public function run()
	{
		Classes::create([
			'c_id'  		=> '1',
			'c_name'		=> 'NSString',
			'c_framework'	=> 'String',
			'c_topic'		=> 'Text',
			'c_subtopic'	=> 'Text'
		]);
		Classes::create([
			'c_id'  		=> '2',
			'c_name'		=> 'NSURL',
			'c_framework'	=> 'URL',
			'c_topic'		=> 'Internet',
			'c_subtopic'	=> 'Internet'
		]);
		Classes::create([
			'c_id'  		=> '3',
			'c_name'		=> 'iAd',
			'c_framework'	=> 'advertisement',
			'c_topic'		=> 'advertisement',
			'c_subtopic'	=> 'advertisement'
		]);
		Classes::create([
			'c_id'  		=> '4',
			'c_name'		=> 'UIView',
			'c_framework'	=> 'View',
			'c_topic'		=> 'access device view',
			'c_subtopic'	=> 'device view'
		]);
		Classes::create([
			'c_id'  		=> '5',
			'c_name'		=> 'UnkonwnView',
			'c_framework'	=> 'Unknown',
			'c_topic'		=> 'Just Test',
			'c_subtopic'	=> 'i do not bye'
		]);

	}
}