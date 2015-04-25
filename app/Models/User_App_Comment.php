<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_App_Comment extends Model {

	//
	protected $table = 'user__app__comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','u_id','a_id','comment'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];
}
