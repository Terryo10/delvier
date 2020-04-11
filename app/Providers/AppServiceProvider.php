<?php

namespace App\Providers;

use App\cart;
use Auth;
use Illuminate\Support\ServiceProvider;
use Braintree_Configuration;


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

        view()->composer('*', function ($view) {
            $user = auth::user();
            $quantity = 0;

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

            $view->with('quantity', $quantity);
        });

    }

}
