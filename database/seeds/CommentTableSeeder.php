<?php
use Illuminate\Database\Seeder;
use App\Models\User_App_Comment;
use App\Models\User;
use App\Models\App;
use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		$comment_list = [
		'看見麥兜總召的格局',
		'所以我說那個醬汁呢',
		'李嚴，你怎麼帥成這樣',
		'那些年，子洋的粉色泡泡',
		'刁難哥奇遇記',
		'轉角遇到典型的政大資管人',
		'喔～問題來了',
		'你這樣不Work',
		'資管迎新茶會 5/22 商院101 熱血開踢',
		'5/13 科技組晚上上課有演講者，歡迎到場',
		'Hakuna Matata',
		'老王的五十個案子',
		'杰哥的衣服Queue',
		'中央資管，我愛你們全部',
		'阿~我們就全班宅男啊',
		'我都參考貝克漢穿搭耶',
		'這個大叔是哪來的',
		'現在放棄的話，就可以放暑假了',
		'潮水退了就知道誰沒穿褲子',
		'聽完周老師這番話，全資管系都驚呆了',
		'左手寫詩，右手寫程式',
		'啊不就好棒棒',
		'吃吃看，你吃一口就知道了',
		'德國拳王倒下去，莎拉布萊曼照唱  Time to say goodbye',
		'面對現實，不然現實就面對你',
		'棉被再怎麼抖都會有灰塵',
		'務必冷靜理性透徹，暫時把好惡丟到河流另一邊去',
		'怕熱就不要進廚房',
		'拿破崙說 由馴鹿所領導的獅子軍團 就在也不是獅子軍團',
		'甜甜圈～',
		'在非洲，每六十秒，就有一分鐘過去',
		'當你的左臉被人打，那你的左臉就會痛',
		'英國研究 生日過越多的人就越老',
		'當蝴蝶在南半球拍了兩下翅膀，牠就會稍微飛高一點點',
		'我買了130元的高級鵝肉飯'
		];

		//echo count($comment_list);
		$user_list = User::select('id')->lists('id');
		//echo var_dump($user_list);
		foreach ($user_list as $user_key => $user_value) {
			$app_ran_list = App::orderByRaw("RAND()")->take(35)->lists('id');
				foreach ($app_ran_list as $app_key => $app_value) {
					User_App_Comment::create([
					'u_id'  		=> $user_value,
					'a_id'			=> $app_value,
					'comment'		=> $comment_list[$app_key]
				]);
			}
		}

	}
}