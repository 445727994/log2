<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('User')->prefix('user')->group(function () {
    Route::get('index', 'IndexController@index');
    Route::any('order', 'OrderController@index');
    Route::get('orderDetail','OrderController@orderDetail');
    Route::get('invitation','IndexController@invitation');
    Route::get('help','ArticleController@help');
    Route::get('article','ArticleController@article');
});
