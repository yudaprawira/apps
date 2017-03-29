<?php
$info = readModulInfo(__DIR__.'/../module.json');

//BACKEND
Route::group(['middleware' => 'web', 'prefix' => config('app.backend').'/'.$info['alias'], 'namespace' => 'Modules\Member\Http\Controllers'], function()
{
    Route::match(['GET', 'POST'], '/', 'BeController@index');
    Route::get('/add', 'BeController@form');
    Route::get('/edit/{id}', 'BeController@form')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'BeController@delete')->where('id', '[0-9]+');
    Route::post('/save', 'BeController@save'); 
});


//FRONT END
Route::group(['middleware'=>['web'], 'prefix' => $info['alias'], 'namespace' => 'Modules\Member\Http\Controllers'], function()
{
    Route::get('/', 'FeController@index');
    Route::get('/login', 'FeController@login');
    Route::get('/logout', 'FeController@logout');
    Route::post('/do-login', 'FeController@doLogin');
    Route::post('/do-register', 'FeController@doRegister');
    Route::post('/do-update', 'FeController@doUpdate');
    Route::get('/register', 'FeController@register');
    Route::get('/histori-transaksi', 'FeController@historyTrans');
    Route::get('/{url}.html', 'FeController@index')->where('url', '[a-z0-9\-\_\+]+');
});