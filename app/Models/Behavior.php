<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Behavior extends Model {

	//
	protected $table = 'behaviors';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['b_id', 'b_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];

}
