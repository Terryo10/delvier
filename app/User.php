<?php

namespace App;

use App\delivery;
use App\product as items;
use App\shop as shops;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\PasswordResetNotification;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
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

    protected $with = ['products', 'shops', 'cart', 'orders', 'delivery', 'temporaryAddress','checkoutComponent','pendingOrders'];

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
        return $this->hasOne(shops::class);
    }

    public function orders()
    {
        return $this->hasMany('App\order');
    }
    public function delivery()
    {
        return $this->hasMany('App\delivery');
    }

    public function temporaryAddress()
    {
        return $this->hasOne('App\temporaryAddress');

    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function checkoutComponent(){
        return $this->hasOne('App\checkoutComponent');
    }

    public function pendingOrders(){
        return $this->hasMany('App\pendingorders');
    }

}
