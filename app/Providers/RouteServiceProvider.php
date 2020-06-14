<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
//        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapV1ApiRoutes();
        $this->mapV1H5Routes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
//    protected function mapApiRoutes()
//    {
//        Route::prefix('api')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('routes/api.php'));
//    }

    protected  function mapV1ApiRoutes(){
        Route::middleware('api')->namespace($this->namespace.'\V1')->prefix('api')->group(base_path('routes/v1/api.php'));
    }
    protected  function mapV1H5Routes(){
        Route::middleware(['web','h5'])->namespace($this->namespace.'\V1')->group(base_path('routes/v1/h5.php'));
      //  Route::middleware(['web','wechat.oauth','h5'])->namespace($this->namespace.'\V1')->group(base_path('routes/v1/h5.php'));
    }
//    protected function mapApiV1Routes()
//    {
//        Route::prefix('api')
//            ->middleware('api')
//            ->namespace($this->namespace)
//            ->group(base_path('routes/api/v1/api.php'));
//    }
}
