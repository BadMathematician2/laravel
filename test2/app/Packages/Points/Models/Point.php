<?php


namespace App\Packages\Points\Models;


use RedisCache\Traits\CacheTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Point extends Model
{
    use CacheTrait;
    protected $table = 'points';

    protected $guarded = ['id'];


}
