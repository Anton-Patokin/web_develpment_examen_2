<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    public function translations()
    {
        return $this->hasMany('App\Item_translation');
    }
    public function colors()
    {
        return $this->hasMany('App\Item_color');
    }
    public function fotos()
    {
        return $this->hasMany('App\Item_foto');
    }
    public function tags()
    {
        return $this->hasMany('App\Item_tag');
    }
    public function dimensions()
    {
        return $this->hasMany('App\Item_dimension');
    }
    public function shapes()
    {
        return $this->hasMany('App\Item_shape');
    }

    protected $dates = ['deleted_at'];
}
