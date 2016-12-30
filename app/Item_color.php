<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item_color extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];
}
