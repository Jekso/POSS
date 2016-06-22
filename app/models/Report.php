<?php

class Report extends \Eloquent {
	protected $fillable = [];
	public static $rules = [
		'petrol_volume'	=>	'required|numeric',
		'temperature'	=>	'required|numeric',
		'presure'		=>	'required|numeric'
	];
	


	/* --------------------------------------- Relationships | START --------------------------------------*/

	public function rig()
	{
		return $this->belongsTo('Rig') ;
	}

	/* --------------------------------------- Relationships | END --------------------------------------*/








	/* --------------------------------------- Helpers | START --------------------------------------*/


	public static function updateReport($inputs,$rig_id)
	{
		$report = Report::firstOrNew(['rig_id' => $rig_id]) ;
		$report->petrol_volume	= $inputs['petrol_volume'] ;
		$report->temperature	= $inputs['temperature'] ;
		$report->presure		= $inputs['presure'] ;
		$report->save();
	}

	/* --------------------------------------- Helpers | END --------------------------------------*/

}