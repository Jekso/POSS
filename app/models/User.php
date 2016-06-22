<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	public static $rules = [
		'username' => 'required',
		'password' => 'required'
	];





	/* --------------------------------------- Relationships | START --------------------------------------*/
	
	public function rigs()
	{
		return $this->belongsToMany('Rig','rigs_users','user_id','rig_id') ;
	}

	/* --------------------------------------- Relationships | END --------------------------------------*/










	/* --------------------------------------- Helpers | START --------------------------------------*/
	


	public static function is_worker($user)
	{
		return ($user->admin_rank === 0) ;
	}






	public static function is_supervisor($user)
	{
		return ($user->admin_rank === 1) ;
	}






	public static function is_master($user)
	{
		return ($user->admin_rank === 2) ;
	}






	public static function getAllWorkers()
	{
		return User::where('admin_rank',0)->orderBy('username')->lists('id','username') ;
	}

	/* --------------------------------------- Helpers | END --------------------------------------*/


}
