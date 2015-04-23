<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model {

	//
	protected $table = 'classes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['c_id','c_name','c_framework','c_topic','c_subtopic'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];
}
