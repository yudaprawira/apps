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
Route::group(['prefix' => config('app.backend')], function()
{

    Route::get('/', 'BE\DashboardController@homepage');

    //log
    Route::match(['GET', 'POST'], '/system-log', 'BE\DashboardController@systemLog');


//USER ACCOUNT
    //logout
    Route::get('/logout', 'BE\UserAccountController@logout');
    
    //login
    Route::match(['GET', 'POST'], '/login', 'BE\UserAccountController@login');
    
    //change password
    Route::match(['GET', 'POST'], '/change-password', 'BE\UserAccountController@changePassword');
    
    //reset password
    Route::match(['GET', 'POST'], '/reset-password', 'BE\UserAccountController@resetPassword');

    //create password
    Route::match(['GET', 'POST'], '/create-password', 'BE\UserAccountController@createPassword');

//SYSTEM
    //User Level
    Route::group(['prefix' => '/system-level'], function()
    {
        Route::match(['GET', 'POST'], '/', 'BE\SystemController@level');
        Route::post('/save', 'BE\SystemController@saveLevel');
        Route::get('/edit/{id}', 'BE\SystemController@buildFormLevel')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'BE\SystemController@deleteLevel')->where('id', '[0-9]+');
    });

    //Module
    Route::group(['prefix' => '/system-modules'], function()
    {
        Route::match(['GET', 'POST'], '/', 'BE\SystemController@module');
    });

    //Documentations
    Route::group(['prefix' => '/system-documentations'], function()
    {
        Route::get('/', 'BE\SystemController@documentation');
    });

    //Menu
    Route::group(['prefix' => '/system-menu'], function()
    {
        Route::match(['GET', 'POST'], '/', 'BE\SystemController@menu');
        Route::post('/save', 'BE\SystemController@saveMenu');
        Route::post('/order', 'BE\SystemController@saveOrder');
        Route::post('/access/{id}', 'BE\SystemController@saveAccess')->where('id', '[0-9]+');
        Route::get('/edit/{id}', 'BE\SystemController@buildFormMenu')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'BE\SystemController@deleteMenu')->where('id', '[0-9]+');
    });

    //menu Access
    Route::match(['GET', 'POST'], '/system-menu-access', 'BE\SystemController@menuAccess');
    
    //User Account
    Route::group(['prefix' => '/system-user'], function()
    {
        Route::match(['GET', 'POST'], '/', 'BE\SystemController@user');
        Route::post('/save', 'BE\SystemController@saveUser');
        Route::get('/edit/{id}', 'BE\SystemController@buildFormUser')->where('id', '[0-9]+');
        Route::get('/delete/{id}', 'BE\SystemController@deleteUser')->where('id', '[0-9]+');
    });
    

});

//FRONTEND
Route::group(['prefix' => '/'], function()
{

    Route::get('/', 'FE\HomeController@index');
});
        
include_once __DIR__.'/../Helpers/core.php';
include_once __DIR__.'/../Helpers/compress.php';