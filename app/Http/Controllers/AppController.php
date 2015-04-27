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
		//multisearch
		$app_list = App::select('id','name','genre','rating');

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
		$apps = $app_list->get();
		if(empty($apps->first())){
			return Response::json(array('message' => 'Empty Query Man~', 'status' => 'error'));
		}else{
			foreach ($apps as $key => $value) {
				
				$app_suck_counts = App::join('user__app__sucks','user__app__sucks.a_id','=','apps.id')
									->where('apps.id','=',$value['id'])
									->count();

				$app_comment_counts = App::join('user__app__comments','user__app__comments.a_id','=','apps.id')
									->where('apps.id','=',$value['id'])
									->count();
				$value->suck_count = $app_suck_counts;
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

					$check_suck = App::join('user__app__sucks','user__app__sucks.a_id','=','apps.id')
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

					$check_suck = App::join('user__app__sucks','user__app__sucks.a_id','=','apps.id')
										->where('user__app__sucks.u_id','=',$user_id)
										->first();
					//return $check_suck;
					if(empty($check_suck)){
						return Response::json(array('message' => 'Not suck.', 'status' => 'error'));
					}else{
						$check_suck->delete();
						return Response::json(array('message' => 'Delete success.', 'status' => 'success'));
					}
					break;

				case 'edit_comment':
					
					$comment_id = Input::get('comment_id');

					$check_comment = User_App_Comment::where('id','=',$comment_id)
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
							->select('behaviors.name','app__behaviors.score')
							->get();

		$app_suck_counts = App::join('user__app__sucks','user__app__sucks.a_id','=','apps.id')
								->where('apps.id','=',$id)
								->count();

		$app_comment_counts = App::join('user__app__comments','user__app__comments.a_id','=','apps.id')
								->where('apps.id','=',$id)
								->count();

		$app_detail->behaviors = $app_behaviors;
		$app_detail->suck_count = $app_suck_counts;
		$app_detail->app_comment = $app_comment_counts;

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
