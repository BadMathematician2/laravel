<?php


namespace App\Packages\GoogleObjectsCategories;


use Illuminate\Support\Facades\Facade;

class GoogleObjectsCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return'GoogleCategory';
    }
}
