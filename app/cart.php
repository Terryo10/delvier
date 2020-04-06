<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\cart_items as pr;

class cart extends Model
{
    protected $with = ['cart_items'];

    public function cart_items()
    {
        return $this->hasMany(pr::class);
    }
}
