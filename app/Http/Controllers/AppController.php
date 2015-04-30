<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, Response, Input, Hash;
use \App\Models\App;
use \App\Models\Behavior;
use \App\Models\User_App_Comment;
use \App\Models\User_App_Suck;
use \App\Models\User;

class AppController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$status= Input::get('status');

		if($status == 'comment'){
			$comment_new = User_App_Comment::join('apps','apps.id','=','user__app__comments.a_id')
											->join('users','users.id','=','user__app__comments.u_id')
											->select('user__app__comments.id','users.name as user_name','apps.name as app_name','apps.id as app_id','apps.img_url as app_img','comment','user__app__comments.created_at')
											->orderBy('user__app__comments.created_at','desc')
											->take(5)
											->get();

			return $comment_new;
		}

		//multisearch
		$app_list = App::leftjoin('user__app__sucks','user__app__sucks.a_id','=','apps.id')
						->select('apps.id','apps.name','apps.img_url','apps.genre','apps.rating',\DB::raw('count(user__app__sucks.id) as suck_count'))
						->groupBy('apps.id')
						->orderBy('suck_count','desc');
		if(Input::has('name')){
		 	$name = Input::get('name');
			$app_list -> where('apps.name','LIKE','%'.$name.'%');
		}

		if(Input::has('genre')){
			$genre = Input::get('genre');
			$app_list -> where('apps.genre','=',$genre);
		}

		if(Input::has('skip')){
			$skip = Input::get('skip');
			$app_list->skip($skip);
		}
		$apps = $app_list->take(10)->get();
		if(empty($apps->first())){
			return Response::json(array('message' => 'Empty Query Man~', 'status' => 'error'));
		}else{
			foreach ($apps as $key => $value) {
				
				$app_comment_counts = App::join('user__app__comments','user__app__comments.a_id','=','apps.id')
									->where('apps.id','=',$value['id'])
									->count();
				//$value->suck_count = $app_suck_counts;
				$value->app_comment = $app_comment_counts;
				
			}
			return $apps;
		}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$status = Input::get('status');

		if(Auth::check()){
			$user_id = Auth::user()->id;

			switch ($status) {
				case 'apps_comment':
					
					$comment = Input::get('comment');
					$app_id = Input::get('app_id');
						
					$new_comment = new User_App_Comment;
					$new_comment->u_id 		= $user_id;
					$new_comment->a_id 		= $app_id;
					$new_comment->comment 	= $comment;
					$new_comment->save();

					$new_comment->status = 'success';
					return $new_comment;
					break;

				case 'user_suck':
					
					$app_id = Input::get('app_id');

					$check_suck = User::join('user__app__sucks','user__app__sucks.u_id','=','users.id')
										->where('user__app__sucks.a_id','=',$app_id)
										->where('user__app__sucks.u_id','=',$user_id)
										->first();
					//return $check_suck;
					if(empty($check_suck)){
						$new_suck = new User_App_Suck;
						$new_suck->u_id = $user_id;
						$new_suck->a_id = $app_id;

						$new_suck->save();

						$new_suck->status = 'success';
						return $new_suck;
					}else{
						return Response::json(array('message' => 'Have already suck.', 'status' => 'error'));
					}
					break;

				case 'user_unsuck':
					
					$app_id = Input::get('app_id');

					$check_suck = User::join('user__app__sucks','user__app__sucks.u_id','=','users.id')
										->where('user__app__sucks.a_id','=',$app_id)
										->where('user__app__sucks.u_id','=',$user_id)
										->select('user__app__sucks.id as id')
										->first();
					//return $check_suck;
					if(empty($check_suck)){
						return Response::json(array('message' => 'Not suck.', 'status' => 'error'));
					}else{
						$delete_suck = User_App_Suck::where('user__app__sucks.id','=',$check_suck['id'])
										->delete();
						return Response::json(array('message' => 'Delete success.', 'status' => 'success'));
					}
					break;

				case 'edit_comment':
					
					$comment_id = Input::get('comment_id');

					$check_comment = User_App_Comment::where('id','=',$comment_id)
									->where('u_id','=',$user_id)
									->first();
					if(empty($check_comment)){
						return Response::json(array('message' => 'No comment.', 'status' => 'error'));
					}else{
						$comment = Input::get('comment');
						$check_comment->comment = $comment;
						$check_comment->update();

						$check_comment->status = 'success';
						return $check_comment;
					}
					break;
				case 'delete_comment':
					
					$comment_id = Input::get('comment_id');

					$check_comment = User_App_Comment::where('id','=',$comment_id)
													->where('u_id','=',$user_id)
													->first();
					if(empty($check_comment)){
						return Response::json(array('message' => 'No comment.', 'status' => 'error'));
					}else{
						if($check_comment['u_id']!=$user_id){
							return Response::json(array('message' => 'Not same user', 'status' => 'error'));
						}else{
							$check_comment->delete();
							return Response::json(array('message' => 'Delete success', 'status' => 'success'));
						}
					}		

					break;
				default:
					return Response::json(array('message' => 'Status error', 'status' => 'error'));
					break;
			}

		}else{
			return Response::json(array('message' => 'Plz login first', 'status' => 'error'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$app_detail = App::where('id','=',$id)
						->first();

		$app_behaviors = App::join('app__behaviors','app__behaviors.a_id','=','apps.id')
							->join('behaviors','behaviors.id','=','app__behaviors.b_id')
							->where('apps.id','=',$id)
							->select('behaviors.id','behaviors.name','app__behaviors.score')
							->get();

		$app_comments = User_App_Comment::join('apps','apps.id','=','user__app__comments.a_id')
										->join('users','users.id','=','user__app__comments.u_id')
										->where('user__app__comments.a_id','=',$id)
										->select('user__app__comments.id','users.id as user_id','users.name as user_name','comment','user__app__comments.created_at as comment_time')
										->orderBy('user__app__comments.created_at','desc')
										->get();

		$app_suck_counts = App::join('user__app__sucks','user__app__sucks.a_id','=','apps.id')
								->where('apps.id','=',$id)
								->count();

		$app_comment_counts = App::join('user__app__comments','user__app__comments.a_id','=','apps.id')
								->where('apps.id','=',$id)
								->count();

		$app_detail->behaviors = $app_behaviors;
		$app_detail->comments = $app_comments;
		$app_detail->suck_count = $app_suck_counts;
		$app_detail->comment_count = $app_comment_counts;

		if(Auth::check()){
			$user_id = Auth::user()->id;
			$check_suck = User::join('user__app__sucks','user__app__sucks.u_id','=','users.id')
										->where('user__app__sucks.a_id','=',$id)
										->where('user__app__sucks.u_id','=',$user_id)
										->first();
			if(empty($check_suck)){
				$user_suck = "Not yet";
			}else{
				$user_suck = "Already";
			}
		}else{
			$user_suck = "Not login";
		}
		$app_detail->user_suck = $user_suck;
		$app_detail->success = 'success';
		return $app_detail;

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
