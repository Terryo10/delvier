<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop;
use Auth;

class SupplyerController extends Controller
{

    public function index(){
        return view('supplier.index');
    }

    public function shops(){
        $shops = auth::user()->shops;
      
        return view('supplier.shops.index')
        ->with('shops',$shops);
    }
    
    public function settings(){
        return view('supplier.settings');
    }
}
