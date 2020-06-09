<?php

namespace App\Providers;

use App\cart;
use App\cartegory;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        view()->composer('*', function ($view) {
            $user = auth::user();
            if ($user !== null) {
                $cartglobal = $user->cart;
            } else {
                $cartglobal = [];

            }

            if ($user !== null) {
                if ($cartglobal !== null) {
                    $cartitemsglobal = $cartglobal->cart_items;

                } else {
                    $cartitemsglobal = [];

                }

            }
            else {
                    $cartitemsglobal = [];

                }

            $totalwebglobal = $this->totalwebglobal();

            $categoryese = cartegory::all();
            $quantity = 0;
            // dd($user);

            if ($user !== null) {
                if ($user->cart !== null) {
                    $cart = cart::find($user->cart->id);
                    // $count = $cart->cart_items->count();
                    foreach ($cart->cart_items as $item) {
                        $quantity += $item->quantity;
                    }

                } else {
                    $quantity = 0;
                }
            } else {

            }

            $view->with('quantity', $quantity)
                ->with('categoryese', $categoryese)
                ->with('cartitemsglobal', $cartitemsglobal)
                ->with('totalwebglobal', $totalwebglobal);
        });

    }

    public function totalwebglobal()
    {
        $user = auth::user();
        if ($user !== null) {
            if ($user->cart !== null) {
                $cart_items = $user->cart->cart_items;
                if (!$cart_items) {
                    return $total = 0;
                } else {
                    $total = 0;
                    foreach ($cart_items as $item){
                        $total = $total + ($item->quantity * $item->price);
                    }
                    return $total;
                }
            }
            return $total = 0;

        }
        // dd($user);

    }

}
