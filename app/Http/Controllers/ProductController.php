<?php

namespace App\Http\Controllers;

use App\cartegory;
use App\product;
use Auth;
use Illuminate\Http\Request;
use App\shop;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth::user();

        $category = cartegory::all();
        $shops = Auth::user()->shops;

        return view('supplier.products.create')
            ->with('category', $category)
            ->with('shops', $shops);
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
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'firstImage' => 'required',
            'firstImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Handle Images Uploads
        if ($request->hasFile('firstImage')) {
            //Get filename with extension
            $filenameWithExt = $request->file('firstImage')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Getting file extension
            $extension = $request->file('firstImage')->getCLientOriginalExtension();
            //Stored name
            $malobolo = $filename . '_' . time() . '_.' . $extension;
            //Uploading Thumbnail

            //model->
            $request->file('firstImage')->storeAs('public/product_images', $malobolo);
        } else {
            $malobolo = 'noimage.jpg';
        }

        if ($request->hasfile('image')) {

            foreach ($request->file('image') as $image) {
                //Get filename with extension
                $filenameWithExt = $image->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Getting file extension
                $extension = $image->getCLientOriginalExtension();
                //Stored name
                $fileNameToStore = $filename . '_' . time() . '_.' . $extension;
                //Uploading Thumbnail

                //model->
                $image->storeAs('public/product_images', $fileNameToStore);
                $data[] = $fileNameToStore;
            }
            
          
        }

        $getshop = shop::find($request->shop_id);
        //select * from shop where id = id
        
        $phone= $getshop->phone;
        $getWhatsapp = $getshop->whatsappPhone;
        // $getWhatsapp = $getshop->

        $user = auth::user()->id;
        $product = new product;
        $product->name = $request->input('name');
        //save multiple images as json
        $product->imagePath = json_encode($data);
        $product->firstImage = $malobolo;
        $product->price = $request->input('price');
        $product->quantity = $request->input('qty');
        $product->description = $request->input('description');
        $product->user_id = $user;
        $product->cartegory_id = $request->input('category_id');
        $product->shop_id = $request->input('shop_id');
        $product->whatsappPhone = $getWhatsapp;
        $product->phone = $phone;
        $product->save();
        return redirect('/supplier/shops')->with('success', 'Product Created Successfully');

        // return redirect('/shops/'+$pra)->with('success', 'Product Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = product::where('name', 'like', "%$query%")->get();
        return view('search-results')->with('products', $products);
    }

    public function searchMobile(Request $request)
    {
        $query = $request->input('query');
        $products = product::where('name', 'like', "%$query%")->get();

        if ($products->count() == 0) {
            return response()->json([
                'success' => false,
                'results' => 'No search results found',
            ]);
        } else {
            return response()->json([
                'success' => true,
                'results' => $products,
            ]);
        }
    }
}
