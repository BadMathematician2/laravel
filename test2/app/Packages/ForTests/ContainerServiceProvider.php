<?php


namespace App\Packages\ForTests;


use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use RedisCache\RedisCacheServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('abc', function (){
            $a = new Application();
            $a->setBasePath(__DIR__);
           // $a->register(RedisCacheServiceProvider::class);
            return $a;
        });
        $this->app->bind('bca', function (){
            return new Application();
        });
    }
}
