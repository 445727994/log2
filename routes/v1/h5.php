<?php

use Illuminate\Http\Request;
use function foo\func;

/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/5/4
 * Time: 21:48
 */
Route::namespace('H5')->group(function () {
    include_route_files(__DIR__.'/h5/');
});
