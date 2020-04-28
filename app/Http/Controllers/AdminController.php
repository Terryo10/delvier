<?php

namespace App\Http\Controllers;

use App\order;
use App\product;
use App\shop;
use App\User;

class AdminController extends Controller
{
    //Users management
    public function users()
    {
        $users = user::all();
        return view('admin.users.index')
            ->with('users', $users);

    }

    public function single($id)
    {
        $user = user::find($id);
        return view('admin.users.edit')
            ->with('user', $user);
    }

    public function viewSingle($id)
    {
        $singleuser = user::find($id);
        return view('admin.users.show')
            ->with('singleuser', $singleuser);
    }

    //Shops Management
    public function shops()
    {
        $shops = shop::all();
        return view('admin.shops.index')
            ->with('shops', $shops);
    }
    //Products Manager
    public function products()
    {
        $products = product::all();
        return view('admin.products.index')
            ->with('products', $products);
    }

    public function oders()
    {
        $orders = order::all();
        return view('admin.orders.index')
            ->with('orders', $orders);
    }
    public function income()
    {

    }

    public function payouts()
    {

    }

    public function messages()
    {

    }

    public function delivery()
    {

    }
}
