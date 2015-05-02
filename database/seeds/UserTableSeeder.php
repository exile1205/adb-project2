<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// User::create([
		// 	'id'  		=> '1',
		// 	'name'		=> 'Tester',
		// 	'email'		=> 'hello@gmail.com',
		// 	'img'		=> '/image/user/1.jpg',
		// 	'self_intro'=> 'this is a test',
		// 	'password'	=> Hash::make('abc123')
		// ]);

		$index = ['103356003', '103356004', '103356005', '103356006', '103356008', '103356010', '103356011', '103356012', '103356013', '103356014', '103356015', '103356016', '103356018', '103356019', '103356020', '103356021', '103356022', '103356023', '103356024', '103356025', '103356026', '103356027', '103356028', '103356029', '103356030', '103356031', '103356032', '103356033', '103356034', '103356035', '103356036', '103356037', '103356038', '103356039', '103356040', '103356041', '103356042', '103356043', '103356044', '103356045'];
		$name = ['曾玉輝', '賴智祥', '方子睿', '李欣穎', '蔡耀賢', '彭仁柏', '萬恩福', '李立晟', '陳俊維', '余曉玟', '顏照銓', '巫宇涵', '莊淳中', '王韋仁', '陳昭元', '胡學賓', '黃泓銘', '王祖韵', '張修維', '陳俞仲', '黃書韋', '賴柏帆', '謝承豫', '張良碩', '林子洋', '呂亮緯', '鄧亦安', '蕭博修', '莊迪凱', '呂奕勳', '廖庭毅', '王翊家', '黃鵬蒨', '陳晉杰', '林洸儂', '褚宣凱', '廖尉辰', '宋伯謙', '魏曉晨', '衛瀟'];


		//$faker = Faker::create();

		foreach ($index as $key=>$value) {

			// $index = $key + 1;
			// $name = $name[$key];
		 //    $email = $index[$key].'@nccu.edu.tw';
		 //    $password = Hash::make('Suck'.$index[$key]);
		 //    $self_intro = '這個傢伙很懶，什麼都沒寫';
		    //print $value;
		    User::create([
			'id'  		=> $key + 1,
			'name'		=> $name[$key],
			'email'		=> $index[$key].'@nccu.edu.tw',
			'img'		=> "/image/user/".rand(1,10).".jpg",
			'self_intro'=> '這個傢伙很懶，什麼都沒寫',
			'password'	=> Hash::make('Suck'.$index[$key])
		]);
		}
	}
}