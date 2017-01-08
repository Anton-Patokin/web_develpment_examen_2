<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item_translation extends Model
{
    use SoftDeletes;

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    protected $dates = ['deleted_at'];
}
