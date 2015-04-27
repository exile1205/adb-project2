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
	protected $fillable = ['id', 'name', 'genre','rating','rating_users','description','arm','img_url'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];
}
