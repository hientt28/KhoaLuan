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
    Route::get('/electric_price' , ['as' =>'electric_price', 'uses' => 'HomeController@electric_price']);
    Route::get('/change_password' , ['as' =>'change_password', 'uses' => 'HomeController@changepass']);
    // update password user
    Route::post('users/password', [
        'as' => 'update_password',
        'uses' => 'Auth\PasswordController@update'
    ]);
    Route::resource('users', 'UserController');
    Route::resource('rooms', 'RoomController');
    Route::get('rooms/{id}/appliances/create', [
        'as' => 'rooms.appliances.create',
        'uses' => 'RoomController@getcreateApp'
    ]);

    Route::post('rooms/{id}/appliances/store', [
        'as' => 'rooms.appliances.store',
        'uses' => 'RoomController@createApp'
    ]);
    Route::get('rooms/{id}/appliances', [
        'as' => 'rooms.appliances.list',
        'uses' => 'ApplianceController@listApp'
    ]);
    Route::delete('rooms/appliances/{id}', [
        'as' => 'rooms.appliances.delete',
        'uses' => 'ApplianceController@getDelete'
    ]);
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
    
    Route::resource('users', 'UserController'); 
     Route::get('users/search', [
        'as' => 'search',
        'uses' => 'UserController@search'
    ]);
    Route::resource('appliances', 'ApplianceController');

});


