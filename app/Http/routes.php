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
   
    Route::resource('categories', 'CategoryController');
    Route::resource('schedules', 'ScheduleController');
    
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

    Route::resource('appliances', 'ApplianceController');

    Route::get('columncharts', 'ChartController@getColumnChart')->name('columncharts');
    Route::get('donutcharts', 'ChartController@getDonutChart')->name('donutcharts');
    Route::get('piecharts', 'ChartController@getPieChart')->name('piecharts');
    
});
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/',[
        'as' => 'admin',
        'uses' => 'AdminController@index',
    ]);
    Route::resource('rooms', 'RoomController');

    Route::get('rooms/{id}/appliances/create', [
        'as' => 'admin.rooms.appliances.create',
        'uses' => 'RoomController@getcreateApp'
    ]);

    Route::post('rooms/{id}/appliances/store', [
        'as' => 'admin.rooms.appliances.store',
        'uses' => 'RoomController@createApp'
    ]);
    Route::get('rooms/{id}/appliances', [
        'as' => 'admin.rooms.appliances.list',
        'uses' => 'ApplianceController@listApp'
    ]);
    Route::delete('rooms/appliances/{id}', [
        'as' => 'admin.rooms.appliances.delete',
        'uses' => 'ApplianceController@getDelete'
    ]);
    Route::resource('users', 'UserController', ['except' => 'destroy']); 
    Route::resource('appliances', 'ApplianceController');

});


