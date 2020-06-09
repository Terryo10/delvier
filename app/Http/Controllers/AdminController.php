<?php

namespace App\Http\Controllers;

use App\order;
use App\product;
use App\shop;
use App\User;
use App\order_items;
use Illuminate\Http\Request;

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

    public function usersupdate(Request $request, $id)
    {
        // return $request;
        // $id = $request->id;
        $user = User::findOrFail($id);
        $user->update([
            'role' => $request->input('role'),
        ]);

        return 123;

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
        $orderItems = order_items::all();
        $orders = order::all();
        return view('admin.orders.index')
            ->with('orderItems',$orderItems);
    }
    public function income()
    {

    }

    public function payout($id)
    {
        $orderItem = order_items::find($id);
        return view('admin.orders.edit')
        ->with('orderItem',$orderItem);


    }

    public function messages()
    {

    }

    public function delivery()
    {

    }
}
