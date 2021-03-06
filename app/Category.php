<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function translations()
    {
        return $this->hasMany('App\Category_translation');
    }
    public function items()
    {
        return $this->hasMany('App\Item');
    }
    
}
