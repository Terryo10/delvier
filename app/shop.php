<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product as items;


class shop extends Model
{
     protected $with = ['products','order_items','pendingorders'];

     public function products(){
       return  $this->hasMany(items::class);
     }

     public function order_items(){
       return $this->hasMany('App\order_items')->orderBy('id','DESC');
     }

    public function pendingorders(){
        return $this->hasMany('App\pendingorders');
    }
}
