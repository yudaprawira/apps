<?php
$info = readModulInfo(__DIR__.'/../module.json');

//BACKEND
Route::group(['middleware' => 'web', 'prefix' => config('app.backend').'/'.$info['alias'], 'namespace' => 'Modules\Wishlist\Http\Controllers'], function()
{
    Route::match(['GET', 'POST'], '/', 'BeController@index');
    Route::get('/add', 'BeController@form');
    Route::get('/edit/{id}', 'BeController@form')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'BeController@delete')->where('id', '[0-9]+');
    Route::post('/save', 'BeController@save'); 
});


//FRONT END
Route::group(['middleware'=>'web', 'prefix' => $info['alias'], 'namespace' => 'Modules\Wishlist\Http\Controllers'], function()
{
    Route::get('/', 'FeController@index');
    Route::get('/delete/{id}', 'FeController@delete')->where('id', '[0-9\-\_\+]+');
    Route::get('/{category}/{url}.html', 'FeController@add')->where('category', '[a-z0-9\-\_\+]+')->where('url', '[a-z0-9\-\_\+]+');
});