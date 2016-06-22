<?php



/* --------------------------------------- Home | START -------------------------------------------------*/

Route::get('/',['as'=>'home','uses'=>'UserController@getHome']);

/* --------------------------------------- Home | END -------------------------------------------------*/










/* --------------------------------------- Auth Routes | START ------------------------------------------*/

Route::get('login',['as'=>'login','uses'=>'UserController@getLogin']);
Route::get('logout',['as'=>'logout','uses'=>'UserController@getLogout']);
Route::post('login',['as'=>'login.post','uses'=>'UserController@postLogin']);

/* --------------------------------------- Auth Routes | END ------------------------------------------*/











//Must Be Logged In Routes
Route::group(array('before'=>'auth'),function(){




	/* --------------------------------------- Workers Routes | START --------------------------------------*/

	Route::get('profile',['as'=>'user.profile','uses'=>'RigController@getProfile']);
	Route::get('profile/rig/{name}',['as'=>'user.rig','uses'=>'RigController@getWorkerRig']);
	Route::post('profile/rig/{name}',['as'=>'user.rig.report.post','uses'=>'RigController@postReport']);

	/* --------------------------------------- Workers Routes | END --------------------------------------*/








	/* ----------------------------------- Admin Routes | START ------------------------------------*/

	Route::get('dashboard',['as'=>'admin.dashboard','uses'=>'RigController@getDashboard']);
	Route::get('dashboard/rig/{name}',['as'=>'admin.dashboard.rig','uses'=>'RigController@getAdminRig']);
	Route::get('dashboard/rig/{name}/edit',['as'=>'admin.dashboard.edit.rig','uses'=>'RigController@getEditRig']);
	Route::post('dashboard',['as'=>'admin.dashboard.create.rig','uses'=>'RigController@postAddRig']);
	Route::post('dashboard/rig/{id}/delete',['as'=>'admin.dashboard.delete.rig','uses'=>'RigController@postDeleteRig']);
	Route::post('dashboard/rig/{name}/edit',['as'=>'admin.dashboard.update.rig','uses'=>'RigController@postEditRig']);
	/* ----------------------------------- Admin Routes | END ------------------------------------*/
});
