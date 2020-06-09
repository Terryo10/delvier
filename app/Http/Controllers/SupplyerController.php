<?php

namespace App\Http\Controllers;

use App\pendingorders;
use Illuminate\Http\Request;
use App\shop;
use Auth;
use App\User;

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

    public function shopOrders(){
        $shops = auth::user()->shops;
        if($shops == !null){
            $orderItems = $shops->order_items;
        }else{
            $orderItems = [];

        }



        // return $orderItems;
       return view('supplier.orders.index')
       ->with('orderItems',$orderItems);
    }

    public function settings(){
        return view('supplier.settings');
    }

    public function  pendingOrders(){
        $pending = auth::user()->shops->pendingorders;
        return view('supplier.pending.index')->with('pending',$pending);
    }

    public function showPending($id){
        $pending = pendingorders::findorfail($id);
        $user = User::find($pending->user_id);
        $address = $user->temporaryAddress;
        return view('supplier.pending.show')
            ->with('pending',$pending)
            ->with('address',$address);
    }
    public function pendingUpdate(Request $request){
      $pendingorder = pendingorders::findorfail($request->pending_id);
        $pendingorder->update([
            'shipping_price' => $request->input('shipping_price'),
            'procced_to_payment' => $request->input('proceed_to_payment'),
        ]);
        return redirect()->back()->with('success','order updated ');
    }
}
