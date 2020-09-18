<?php


namespace App\Packages\GoogleObjectsCategories\Commands;


use App\Packages\GoogleObjectsCategories\Models\GoogleObject;
use Illuminate\Console\Command;

class GoogleObjectsCategoryCommand extends Command
{
    protected $signature = 'google-category';

    protected $description = 'Take all objects from table google_objects and information about objects set in table google_objects_categories';

    public function handle()
    {
        GoogleObject::query()->chunk(10, function ($objects) {
            foreach ($objects as $object) {
                \GoogleCategory::createCategory($object->data);
            }
        });

    }
}
