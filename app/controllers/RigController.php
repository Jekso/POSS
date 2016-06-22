<?php

class RigController extends \BaseController {




	//before any Post Connection  we use CSRF Protection Function
	//to protect the web app from CSRF Exploitation
	public function __construct()
	{
		$this->beforeFilter('csrf',array('on'=>'post')) ;
	}






	public function getProfile()
	{
		if(!User::is_worker(Auth::user()))
			return Redirect::route('admin.dashboard');

		$user_rigs = Rig::getWorkerRigs(Auth::user()) ;
		return View::make('users.profile',compact('user_rigs')) ;
	}






	public function getWorkerRig($rig_name)
	{
		if(!User::is_worker(Auth::user()))
			return Redirect::route('admin.dashboard');

		$rig = Rig::where('name',$rig_name)->first() ;
		if(isset($rig))
		{
			if(Rig::isUserInRig(Auth::user(),$rig->id))
			{
				$rig_workers 	= $rig->engineers ;
				$rig_report		= $rig->report ;
				return View::make('users.rig',compact('rig','rig_workers','rig_report')) ;
			}
			return Redirect::route('user.profile')->with('msg','this is not your Rig -_- !') ;
		}
		return Redirect::route('user.profile') ;
	}






	public function postReport($rig_name)
	{
		if(!User::is_worker(Auth::user()))
			return Redirect::route('admin.dashboard');

		$rig = Rig::where('name',$rig_name)->first() ;
		if(isset($rig))
		{
			if(Rig::isUserInRig(Auth::user(),$rig->id))
			{
				$validator = Validator::make(Input::all(),Report::$rules) ;
				if($validator->passes())
				{
					Report::updateReport(Input::all(),$rig->id) ;
					return Redirect::back()->with('msg','Updated Successfully!') ;
				}
				return Redirect::back()->withInput()->withErrors($validator) ;
			}
			return Redirect::route('user.profile')->with('msg','this is not your Rig -_- !') ;
		}
		return Redirect::route('user.profile') ;
	}






	public function getDashboard()
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		$all_rigs = Rig::all() ;
		if(User::is_master(Auth::user()))
		{
			$all_workers = User::getAllWorkers() ;
			return View::make('admins.dashboard_master',compact('all_rigs','all_workers')) ;
		}
		return View::make('admins.dashboard_supervisor',compact('all_rigs')) ;
	}







	public function getAdminRig($rig_name)
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		$rig = Rig::where('name',$rig_name)->first() ;
		if(isset($rig))
		{
			$rig_workers 	= $rig->engineers()->orderBy('username')->get() ;
			$rig_report		= $rig->report ;
			return View::make('admins.rig',compact('rig','rig_workers','rig_report')) ;
		}
		return Redirect::route('admin.dashboard') ;
	}






	public function postAddRig()
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		if(User::is_master(Auth::user()))
		{
			$validator = Validator::make(Input::all(),Rig::$rules) ;
			if($validator->passes())
			{
				Rig::addNewRig(Input::get('name'),Input::get('place'),Input::get('workers')) ;
				return Redirect::back()->with('msg','New Rig Added Succfully!') ;
			}
			return Redirect::back()->withInput()->withErrors($validator) ;
		}
		return Redirect::route('admin.dashboard') ;
	}











	public function postDeleteRig($rig_id)
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		if(User::is_master(Auth::user()))
		{
			Rig::destroy($rig_id) ;
			return Redirect::back()->with('msg','Deleted Succfully!') ;
		}
		return Redirect::route('admin.dashboard') ;
	}








	public function getEditRig($rig_name)
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		if(User::is_master(Auth::user()))
		{
			$rig = Rig::where('name',$rig_name)->first() ;
			if(isset($rig))
			{
				$all_workers = User::getAllWorkers() ;
				$rig_workers = $rig->engineers()->get()->lists('id') ;
				return View::make('admins.edit_rig',compact('rig','all_workers','rig_workers')) ;
			}
			return Redirect::route('admin.dashboard') ;
		}
		return Redirect::route('admin.dashboard') ;
	}




	public function postEditRig($rig_name)
	{
		if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');

		if(User::is_master(Auth::user()))
		{
			$rig = Rig::where('name',$rig_name)->first() ;
			if(isset($rig))
			{
				$validator = Validator::make(Input::all(),['name' => 'required','place'	=> 'required']) ;
				if($validator->passes())
				{
					Rig::updateRig($rig,Input::get('name'),Input::get('place'),Input::get('workers')) ;
					return Redirect::back()->with('msg','Rig Updated Succfully!') ;
				}
				return Redirect::back()->withInput()->withErrors($validator) ;
			}
			return Redirect::route('admin.dashboard') ;
		}
		return Redirect::route('admin.dashboard') ;
	}



}
