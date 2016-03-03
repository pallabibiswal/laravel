<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
	Route::auth();
	//loads registration page
	Route::get('/register', function () {
    	return view('auth/register');
	});
	
	//post registration data
	Route::post('/postData', 'Auth\RegistrationController@registrationPost'); 
	
	//loads login page 
	Route::get('/login', function () {
		if(Auth::check()) {
    		return view('welcome');
    	} 
    	return view('auth/login');	
	});	
	
	//check user registered or not
	Route::post('/login', 'Auth\AuthController@postLogin'); 

	//loads profile page of logged in user 
    Route::get('/profile', 'UserController@getProfile');

    //loads update page 
    Route::get('/update', 'UserController@getUpdate');

    //post updated data
    Route::post('/edit', 'UserController@postUpdate');

    //loads home page
	Route::get('/home', 'HomeController@index');
	
	//loads welcome page
	Route::get('/', function () {
    	return view('welcome');
	});

	//verify user email id
	Route::get('verify/{data}','Auth\RegistrationController@confirm');

	//loads assignment page
	Route::get('assignment','AclController@getAssignment');
	
	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| This route group applies the "admin" middleware group to every route
	| it contains where only admin can access these routes.
	|
	*/
	Route::group(['middleware' => ['admin']], function () {

		//loads grid page
		Route::get('/grid','AclController@grid');

		//loads add page
		Route::get('/add','AclController@getAdd');

		//get data and display in grid
		Route::post('/grid', 'AclController@viewGrid');

		//get tweeted data
		Route::get('/tweetsearch', 'AclController@getTweet');

		//edit or delete grid
		Route::post('/updategrid', 'AclController@updateGrid');

		//loads assign page
		Route::get('/assign','AclController@getAssign');

		//loads privilege page
		Route::get('/privilege','AclController@getPrivilege');

		//add new role
		Route::post('/postrole','AclController@postRole');

		//add new resource
		Route::post('/postresource','AclController@postResource');

		//add new operation
		Route::post('/postoperation','AclController@postOperation');

		//assign role to user
		Route::post('/assignrole','AclController@postAssignRole');

		//assign role to resource
		Route::post('/assignresource','AclController@postAssignResource');

		//assign role to operations
		Route::post('/assignoperation','AclController@postAssignOperation');

		//loads privilege table
		Route::get('/postprivilege','AclController@postPrivilege');

		//post edited privileges
		Route::post('/editprivilege','AclController@editPrivilege');
	});
});


