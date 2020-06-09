<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendingorders extends Model
{
    protected $with = ['cart_item'];

    protected $fillable = [
        'procced_to_payment','shipping_price'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cart_item(){
        return $this->belongsTo('App\cart_items');
    }

    public function shop(){
        return $this->belongsTo('App\shop');
    }

}
