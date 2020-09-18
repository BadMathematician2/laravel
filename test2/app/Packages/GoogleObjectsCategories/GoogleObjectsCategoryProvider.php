<?php


namespace App\Packages\GoogleObjectsCategories;


use App\Packages\GoogleObjectsCategories\Commands\GoogleObjectsCategoryCommand;
use Illuminate\Support\ServiceProvider;

class GoogleObjectsCategoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/categories.php', 'categories');
        $this->app->singleton('GoogleCategory', function () {
            return new GoogleObjectsCategories();
        });
        $this->commands(GoogleObjectsCategoryCommand::class);
    }
}
