<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use RedisCache\Traits\CacheTrait;

class Quote extends Model
{
    use CacheTrait;

    protected $table = 'quotes';
}
