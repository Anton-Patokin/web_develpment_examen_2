<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Item_tag extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];
}
