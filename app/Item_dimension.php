<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_dimension extends Model
{
    public function size()
    {
        return $this->hasMany('App\Dimension_size');
    }
}
