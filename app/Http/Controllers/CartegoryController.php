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
        $category = new cartegory();
        $category->name = $request->input('name');
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
