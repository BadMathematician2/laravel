<?php

return [
    'namespace' => 'App\Packages\Points\Controllers',

    'view_namespace' => 'point',

    'route_config' => [
        'prefix' => 'point',
        'middleware' => ['web', 'admin']
    ]
];
