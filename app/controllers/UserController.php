<?php

class UserController extends BaseController {



	//before filter we use CSRF Protection Function to protect the web app from CSRF Exploitation
	public function __construct()
	{
		$this->beforeFilter('csrf',array('on'=>'post')) ;
	}






	//get the login page
	public function getLogin()
	{
		if(Auth::check())
		{
			if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');
			return Redirect::route('admin.dashboard');
		}
		return View::make('general.login') ;
	}





	//manage the login credintials and check if they true so proceed
	public function postLogin()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes())
	    {	
	    	$username = Input::get('username') ;
	    	$password = Input::get('password') ;
	    	$remember_me = (Input::get('remember_me')) ? true : false ;
	    	if (Auth::attempt(array('username' => $username, 'password' => $password),$remember_me))
			{
				if(User::is_worker(Auth::user()))
					return Redirect::intended('profile');
				return Redirect::intended('dashboard');
			}
		}
		return Redirect::back()->withInput()->withErrors($validator) ;
	}





	//handle the logout process
	public function getLogout()
	{
		Auth::logout();
    	return Redirect::route('login');
	}





	//return the Home Page
	public function getHome()
	{
		if(Auth::check())
		{
			if(User::is_worker(Auth::user()))
				return Redirect::route('user.profile');
			return Redirect::route('admin.dashboard');
		}
		return View::make('general.index') ;
	}

	

}
