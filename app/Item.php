<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function translations()
    {
        return $this->hasMany('App\Item_translation');
    }
}
