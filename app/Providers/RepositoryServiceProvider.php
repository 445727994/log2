<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Interfaces\Taobao\GoodsRepository::class,\App\Repositories\Taobao\GoodsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\Taobao\TbkOrderRepository::class,\App\Repositories\Taobao\TbkOrderRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
