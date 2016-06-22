<?php

class Rig extends \Eloquent {
	protected $fillable = [];
	public static $rules = [
		'name'	=>	'required|unique:rigs' ,
		'place'	=>	'required'
	] ;

	/* --------------------------------------- Relationships | START --------------------------------------*/

	public function report()
	{
		return $this->hasOne('Report','rig_id') ;
	}

	public function engineers()
	{
		return $this->belongsToMany('User','rigs_users','rig_id','user_id') ;
	}

	/* --------------------------------------- Relationships | END --------------------------------------*/








	/* --------------------------------------- Helpers | START --------------------------------------*/

	public static function getWorkerRigs($user)
	{
		return $user->rigs()->orderBy('created_at','asc')->get() ;
	}


	public static function isUserInRig($user,$rig_id)
	{
		return ($user->rigs()->where('rig_id',$rig_id)->count() > 0) ? true : false ;
	}


	public static function addNewRig($name,$place,$workers)
	{
		//add new rig
		$rig = new Rig ;
		$rig->name 		= $name ;
		$rig->place 	= $place ;
		$rig->save() ;


		//add a new report for the rig
		$report = new Report;
		$rig->report()->save($report) ;


		if(count($workers) > 0)
		{
			//add workers to this rig
			$rig->engineers()->attach($workers) ;
		}

	}


	public static function updateRig($rig,$name,$place,$workers)
	{
		$rig->name  = $name ;
		$rig->place = $place ;
		$rig->save() ;
		if(count($workers) > 0)
		{
			$rig->engineers()->sync($workers) ;
		}
		else
		{
			$rig->engineers()->detach() ;
		}
	}

	/* --------------------------------------- Helpers | END --------------------------------------*/

}
