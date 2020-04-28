<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order_items as items;
//use Illuminate\Database\Eloquent\SoftDeletes;


class order extends Model
{
    //use SoftDeletes;

    protected $with = ['order_items'];

    public function order_items()
    {
        return $this->hasOne(items::class);
    }
}
