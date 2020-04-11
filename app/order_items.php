<?php

namespace App;

use App\product as items;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    protected $with = ['product'];

    public function product()
    {
        return $this->Belongsto(items::class);
    }
}
