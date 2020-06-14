<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/13
 * Time: 17:39
 */
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
Route::middleware(['api','jwt.auth'])->namespace('Taobao')->prefix('taobao')->group(function () {
    Route::post('goods', 'GoodsController@index');
    Route::get('goods/detail', 'GoodsController@goodsDetail');
});


