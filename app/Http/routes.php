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
Route::group(['middleware' => 'web'], function() {
	Route::get('/' , ['as' =>'home', 'uses' => 'HomeController@index']);
	Route::get('/dashboard' , ['as' =>'dashboard', 'uses' => 'HomeController@dashboard']);
    Route::resource('users', 'UserController');
    Route::resource('rooms', 'RoomController');
    Route::resource('categories', 'CategoryController');
    
    Route::post('login', [
        'as' => 'login',
        'uses' => 'UserController@login'
    ]);

    Route::post('register', [
        'as' => 'register',
        'uses' => 'UserController@register'
    ]);

    Route::get('logout', [
        'as' => 'logout',
        'uses' =>'UserController@logout'
    ]);
    
});
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/',[
        'as' => 'admin',
        'uses' => 'AdminController@index',
    ]);
    
    Route::resource('users', 'UserController', ['except' => 'destroy']); 
    Route::resource('appliances', 'ApplianceController');
});


