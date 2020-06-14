<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/2/22
 * Time: 14:42
 */
use Illuminate\Http\Request;
Route::namespace('App')->prefix('app')->group(function () {
    Route::any('index', 'IndexController@index');
    Route::any('design', 'IndexController@design');
});
