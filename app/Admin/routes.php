<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
	'prefix' => config('admin.route.prefix'),
	'namespace' => config('admin.route.namespace'),
	'middleware' => config('admin.route.middleware'),
], function (Router $router) {
	$router->get('/', 'HomeController@index')->name('admin.home');
	$router->resource('users', User\Users::class);
	$router->resource('bills', User\Bills::class);
	$router->resource('banks', User\Banks::class);
	$router->resource('cates', User\Cates::class);
    $router->resource('ad-cates', Ads\AdCateController::class);
    $router->resource('ads', Ads\AdsController::class);

    $router->get('app-settings', 'Setting\AppSettingController@set');
    $router->any('app-settings/save', 'Setting\AppSettingController@setUpdate');

});
