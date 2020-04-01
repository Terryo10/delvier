<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product as items;

class cartegory extends Model
{
     protected $with = ['products'];

     public function products(){
       return  $this->hasMany(items::class);
     }
}
