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
Route::auth();
Route::group(['middleware' => 'web'], function() {
	Route::get('/' , ['as' =>'home', 'uses' => 'HomeController@index']);
	Route::get('/dashboard' , ['as' =>'dashboard', 'uses' => 'HomeController@dashboard']);
    Route::resource('user', 'UserController');
    Route::resource('rooms', 'RoomController');
    Route::resource('categories', 'CategoryController');
    Route::resource('appliances', 'ApplianceController');
    
});
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/',[
        'as' => 'admin',
        'uses' => 'AdminController@index',
    ]);
    
    Route::resource('users', 'UserController', ['except' => 'destroy']); 
   
});


