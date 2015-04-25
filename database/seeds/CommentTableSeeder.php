<?php
use Illuminate\Database\Seeder;
use App\Models\User_App_Comment;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		User_App_Comment::create([
			'id'			=> '1',
			'u_id'  		=> '1',
			'a_id'			=> '123',
			'comment'		=> 'I like this app~'
		]);
		User_App_Comment::create([
			'id'			=> '2',
			'u_id'  		=> '1',
			'a_id'			=> '456',
			'comment'		=> 'This app Suck~'
		]);

	}
}