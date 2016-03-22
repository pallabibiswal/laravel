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
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //loads home page
    Route::get('/home', 'HomeController@index');

    //loads search page
    Route::get('/', function () {
    return view('search');
	});

	//get hotel details
    Route::post('search', 'SearchController@hotelDetail');

    //get sorted hotel details
    Route::get('sort', 'SearchController@sortedHotelDetail');

    //get latitude and longitude to display hotels in map
    Route::get('map', 'SearchController@latLngHotels');
});
