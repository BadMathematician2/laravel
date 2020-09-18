<?php


namespace App\Http;


use Illuminate\Support\ServiceProvider;

class MarkersProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('markers', function () {
            return new Markers();
        });
    }
}
