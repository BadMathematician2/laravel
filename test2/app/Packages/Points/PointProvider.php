<?php


namespace App\Packages\Points;


use App\Packages\Points\Models\Point;
use App\Packages\Points\Repositories\Interfaces\PointRepositoryInterface;
use App\Packages\Points\Repositories\PointRepository;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PointProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Packages\Points\Controllers';
    /**
     * @var string
     */
    protected $view_namespace = 'point';
    /**
     * @var array
     */
    protected $route_config = [
        'prefix' => 'point',
        'middleware' => ['web', 'admin']
    ];


    public final function boot()
    {
        $this->routeRegister();
        $this->viewsRegister();
        $this->migrationsRegister();


    }


    private function migrationsRegister()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    private function routeRegister()
    {
        Route::prefix($this->route_config['prefix'])
            ->namespace($this->namespace)
            ->middleware(['web'])
            ->group(__DIR__ . ('/route.php'));

    }


    private function viewsRegister()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', $this->view_namespace);
    }

    public function register()
    {
        $this->app->bind(
            PointRepositoryInterface::class,
            PointRepository::class
        );
    }



}
