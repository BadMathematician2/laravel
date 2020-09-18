<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager';

    protected $fillable = ['name', 'avatar'];
}
