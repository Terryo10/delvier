<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
      protected $fillable = [
        'quantity','firstImage','description','name'
    ];
    
      protected $with = ['parcel'];

      public function parcel(){
        return $this->hasOne('App\parcel');
      }
}
