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
Route::namespace('Auth')->prefix('auth')->group(function () {
    Route::post('login', 'LoginController@login');
    Route::post('register', 'RegisterController@index');
    Route::post('refresh', 'LoginController@refresh');
});


Route::middleware(['api','jwt.auth'])->namespace('Auth')->prefix('auth')->group(function () {
    Route::post('reset_password', 'ResetPasswordController@index');
    Route::post('logout', 'AuthController@logout');
});
