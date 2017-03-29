<?php
$info = readModulInfo(__DIR__.'/../module.json');

//BACKEND
Route::group(['middleware' => 'web', 'prefix' => config('app.backend').'/'.$info['alias'], 'namespace' => 'Modules\Pesanan\Http\Controllers'], function()
{
    Route::match(['GET', 'POST'], '/', 'BeController@index');
    Route::get('/add', 'BeController@form');
    Route::get('/edit/{id}', 'BeController@form')->where('id', '[0-9]+');
    Route::get('/delete/{id}', 'BeController@delete')->where('id', '[0-9]+');
    Route::post('/save', 'BeController@save'); 
});


//FRONT END
Route::group(['middleware'=>'web', 'prefix' => 'keranjang', 'namespace' => 'Modules\Pesanan\Http\Controllers'], function()
{
    Route::get('/', 'FeController@index');//->middleware('cached');
    Route::get('/api', 'FeController@api');//->middleware('cached');
    Route::get('/proses', 'FeController@checkout');
    Route::get('/clear', 'FeController@clear');
    Route::post('/save', 'FeController@save');
    Route::get('/{category}/{url}.html', 'FeController@upd')->where('category', '[a-z0-9\-\_\+]+')->where('url', '[a-z0-9\-\_\+]+');
});

//KONFIRMASI PEMBAYARAN
    Route::match(['GET', 'POST'], '/konfirmasi', 'Modules\Pesanan\Http\Controllers\FeController@confirm');