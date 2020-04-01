<?php

namespace App\Http\Controllers;

use App\cartegory;
use App\product;
use App\shop;
use Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = shop::all();
        return view('supplier.shops.index')
            ->with('shops', $shops);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = cartegory::all();
        return view('shop.create')
            ->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'image' => 'image|nullable|max:1999',
        ]);

        //Handle Images Uploads
        if ($request->hasFile('image')) {
            //Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Getting file extension
            $extension = $request->file('image')->getCLientOriginalExtension();
            //Stored name
            $fileNameToStore = $filename . '_' . time() . '_.' . $extension;
            //Uploading Thumbnail

            //model->
            $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $user = auth::user()->id;
        $shop = new shop();
        $shop->name = $request->input('name');
        $shop->logo = $fileNameToStore;
        $shop->Address = $request->input('address');
        $shop->phone = $request->input('phone');
        $shop->description = $request->input('description');
        $shop->user_id = $user;
        $shop->save();

        return redirect('supplier/shops');

        return route('shop.index')->with('success', 'Shop created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(shop $shop)
    {
        $products = $shop->products;
        return view('supplier.shops.show')
            ->with('shop', $shop)
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(shop $shop)
    {
        $shop->delete();
        return redirect('supplier/shops')->with('success', 'Deleted Successfully');

    }
}
