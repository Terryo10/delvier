<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cartegory as category;

class PagesController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function personalShops(){
        //
    }

    public function categories(){
        $category = category::all();
       
        return view('category')
        ->with('category',$category);
    }

    public function categoryShow(){
       return view('categoryshow'); 
    }

    public function chat(){
        return view('chat');
    }
}
