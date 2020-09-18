<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use RedisCache\Traits\CacheTrait;

class Image extends Model
{
    use CacheTrait;

    protected $table = 'images';
}
