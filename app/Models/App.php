<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model {

	//
	protected $table = 'apps';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['a_id', 'a_name', 'a_genre','a_rating','a_rating_users','a_arm'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];
}
