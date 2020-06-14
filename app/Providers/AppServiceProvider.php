<?php

namespace App\Providers;

use App\Console\Commands\Spider\Tbk;
use App\Models\Setting\AppSetting;
use App\Tools\Tbk\V1\TBKInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //add fixed sql

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //add fixed sql
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //淘宝 spider
        $this->app->when(Tbk::class)
            ->needs(TBKInterface::class)
            ->give(\App\Tools\Tbk\V1\Taobao::class);
//        //京东spider
//        $this->app->when(JingDong::class)
//            ->needs(TBKInterface::class)
//            ->give(\App\Tools\Taoke\V4\JingDong::class);
//        //拼多多spider
//        $this->app->when(PinDuoDuo::class)
//            ->needs(TBKInterface::class)
//            ->give(\App\Tools\Taoke\V4\PinDuoDuo::class);

    }
}
