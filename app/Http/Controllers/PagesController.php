<?php

namespace App\Http\Controllers;

use App\cartegory as category;
use App\product;
use App\User;
use App\shop;
use App\order;

class PagesController extends Controller
{
    public function admin()
    {
        $users = User::all();
        $shops = shop::all();
        $orders = order::all();
        $supplier = User::where('role','=',1)->get();
        return view('admin.index')
            ->with('user', $users)
            ->with('shops',$shops)
            ->with('orders',$orders)
            ->with('supplier',$supplier);
    }

    public function privacy(){
        return view('privacy');
    }

    public function personalShops()
    {
        //
    }

    public function categories()
    {
        $category = category::all();

        return view('category')
            ->with('category', $category);
    }

    public function categoryShow()
    {
        return view('categoryshow');
    }

    public function chat()
    {
        return view('chat');
    }

    public function about()
    {
        return view('about');

    }

    public function service()
    {

    }

    public function shop()
    {
        $products = product::inRandomOrder()->paginate(10);
        return view('shop')
            ->with('products', $products);
    }

    public function categoriesFetch($id)
    {
        $category = category::find($id);
        $products = $category->products;
        return view('singlecategory')
            ->with('category', $category)
            ->with('products', $products);

    }
}
