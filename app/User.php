<?php

namespace App;

use App\product as items;
use App\shop as shops;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use  HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['products', 'shops','cart','orders'];

    public function products()
    {
        return $this->hasMany(items::class);
    }
    public function cart()
    {
        return $this->hasOne('App\cart');
    }

    public function shops()
    {
        return $this->hasMany(shops::class);
    }

     public function orders(){
            return $this->hasMany('App\order');
    }
}
