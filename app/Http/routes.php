<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "UserController@dashboard");
Route::get("/addComments",function()
{
	return view("vendor.addComments");
});

Route::auth();

Route::post("/addComments", "CommentController@addComments");

Route::get('/home', 'HomeController@index');
Route::match(['get','post'],'/admin', 'HotelController@addhotel');
