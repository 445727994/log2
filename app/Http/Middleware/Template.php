<?php

namespace App\Http\Middleware;

use App\Models\Setting\AppSetting;
use Illuminate\Http\Request;
use Closure;
use Illuminate\View\FileViewFinder;
use App;
use View;
class Template
{
    protected $except = [
        //
    ];

    public function handle($request, Closure $next, $guard = null)
    {
        $path = [resource_path('views/'.config('view.tpl1'))];
        //改变模板的目录文件夹,在构造函数中将view加载模板的路径改变，指向我们给定的目录
        View::setFinder (new FileViewFinder(App::make ('files'),$path));
        $AppSetting=AppSetting::getSetting('app_set');
        View::share('setting',$AppSetting);
        return $next($request);
    }

}
