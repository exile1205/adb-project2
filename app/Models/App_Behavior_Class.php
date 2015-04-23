<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App_Behavior_Class extends Model {

	//
	protected $table = 'app__behavior__classes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','a_id','b_id','c_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];
}
