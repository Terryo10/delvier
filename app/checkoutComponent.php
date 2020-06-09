<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkoutComponent extends Model
{
    public function cart_item(){
        return $this->belongsTo('app\cart_items');
    }
}
