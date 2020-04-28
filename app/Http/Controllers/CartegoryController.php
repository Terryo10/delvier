<?php

namespace App\Http\Controllers;

use App\cartegory;
use Illuminate\Http\Request;

class CartegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = cartegory::all();
        return view('admin.category.index')
            ->with('category', $category);
    }

    public function ApiCategory()
    {
        $category = cartegory::all();
        return response()->json([
            'success' => true,
            'category' => $category,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required',
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
            $request->file('image')->storeAs('public/category_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $category = new cartegory();
        $category->name = $request->input('name');
        $category->imagePath = $fileNameToStore;
        $category->save();
        return redirect('/category')->with('success', 'Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cartegory  $cartegory
     * @return \Illuminate\Http\Response
     */
    public function show(cartegory $cartegory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cartegory  $cartegory
     * @return \Illuminate\Http\Response
     */
    public function edit(cartegory $cartegory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cartegory  $cartegory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cartegory $cartegory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cartegory  $cartegory
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartegory $cartegory)
    {
        //
    }
}
