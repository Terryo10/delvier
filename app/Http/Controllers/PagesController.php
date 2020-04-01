<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function personalShops(){
        //
    }

    public function categories(){
        
    }
}
