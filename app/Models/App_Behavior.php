<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App_Behavior extends Model {

	//
	protected $table = 'app__behaviors';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','a_id','b_id','score'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];

}
