<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, Response, Input, Hash;
use \App\Models\User;
use \App\Models\App;
use \App\Models\User_App_Comment;
use \App\Models\User_App_Suck;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return $users;
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
		$status = Input::get('status');

		switch ($status) {
			case 'login':
				$email = Input::get('email');
				$pass = Input::get('password');

				if (Auth::attempt(['email' => $email, 'password' => $pass]))
				{
					$user = User::where('email','=',$email)
								->first();
				    $user->status = 'success';
				    return $user;
				    //return Response::json(array('message' => 'Login success', 'status' => 'success'));
				}else{
					return Response::json(array('message' => 'Wrong email or password', 'status' => 'error'));
				}
				break;
			case 'logout':
				if(Auth::check()){
					Auth::logout();
					return Response::json(array('message' => 'Logout success', 'status' => 'success'));
				}else{
					return Response::json(array('message' => 'Logout fail', 'status' => 'error'));
				}
				break;
			case 'register':
				$email = Input::get('email');
				$pass = Input::get('password');
				$name = Input::get('name');
				$intro = '你好，我是'.$name.'請多多指教～';

				$check_email = User::where('email','=',$email)
									->first();

				if(empty($check_email)){
					$user = new User;
					$img_url = "/image/user/".rand(1,10).".jpg";
					$user->email 		= $email;
					$user->name 		= $name;
					$user->img 			= $img_url;
					$user->self_intro	= $intro;
					$user->password		= Hash::make($pass);

					$user->save();
					return Response::json(array('message' => 'Create User successfully', 'status' => 'success'));
				}else{
					return Response::json(array('message' => 'Email has already used', 'status' => 'error'));
				}
			case 'edit_user':
				if(Auth::check()){
					$user_id = Auth::user()->id;
					$user = User::where('id','=',$user_id)
								->first();

					if ( Input::get('name')){
				       	$user->name = Input::get('name');
				    }
				    if ( Input::get('password')){
				    	$pass = Input::get('password');
				       	$user->password = Hash::make($pass);
				    }
				    if ( Input::get('self_intro')){
				    	$user->self_intro = Input::get('self_intro');
				    }

				    $user->update();
				    $user->status = "success";
			  		return $user;
				}else{
					return Response::json(array('message' => 'Edit user should login first', 'status' => 'error'));
				}
				break;
			default:
				return Response::json(array('message' => 'Wrong Status man~', 'status' => 'error'));
				break;
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

		$user = User::where('id','=',$id)
					->first();
		
		$user_suck_counts = User::where('users.id','=',$id)
								->join('user__app__sucks','user__app__sucks.u_id','=','users.id')
								->count();

		$user_coment_counts = User::where('users.id','=',$id)
									->join('user__app__comments','user__app__comments.u_id','=','users.id')
									->count();
		
		$user_comment_list = User_App_Comment::join('apps','apps.id','=','user__app__comments.a_id')
											->join('users','users.id','=','user__app__comments.u_id')
											->select('user__app__comments.id','apps.id as app_id','apps.name as app_name','apps.img_url as app_img','comment','user__app__comments.created_at')
											->where('users.id','=',$id)
											->orderBy('user__app__comments.created_at','desc')
											->get();

		$user_suck_list = User_App_Suck::join('apps','apps.id','=','user__app__sucks.a_id')
										->join('users','users.id','=','user__app__sucks.u_id')
										->select('user__app__sucks.id','apps.id as app_id','apps.name as app_name','apps.img_url as app_img','user__app__sucks.created_at')
										->where('users.id','=',$id)
										->orderBy('user__app__sucks.created_at','desc')
										->get();		

		$user->suck_counts = $user_suck_counts;
		$user->comments_counts = $user_coment_counts;
		$user->comment_list = $user_comment_list;
		$user->suck_list = $user_suck_list;
		$user->status = 'success';
		return $user;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
