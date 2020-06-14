<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/16
 * Time: 23:30
 */
Route::middleware(['api'])->namespace('Setting')->prefix('setting')->group(function () {
    Route::post('app/{set_name}', 'AppSettingController@index');
});
