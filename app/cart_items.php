<?php

namespace App;

use App\product as product;
use Illuminate\Database\Eloquent\Model;

class cart_items extends Model
{
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function checkoutComponent(){
        return $this->hasMany('App\checkoutComponent');
    }

    public function pendingorders(){
        return $this->hasOne('App\pendingorders');
    }
}
