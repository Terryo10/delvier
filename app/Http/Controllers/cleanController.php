<?php

namespace App\Http\Controllers;

use App\cart_items;
use App\checkoutComponent;
use App\pendingorders;
use App\product;
use App\shop;
use App\User;
use Auth;
use EasyPost\EasyPost;
use Illuminate\Http\Request;

class cleanController extends Controller
{
    // SHIPPING UTILITIES

    public $Key = 'EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ';


    public function selectCheckout(Request $request){
        $cart_item_id = $request['cart_item_id'];
        $shop_id= $request['shop_id'];

        return view('selectshipping')
            ->with('cart_item_id',$cart_item_id)
            ->with('shop_id',$shop_id);

        }


    public function ratesApi(Request $request){
        $user = auth::user();
        $shop = shop::find($request['shop_id']);
        if ($user->cart !== null) {
            $cart_item = cart_items::find($request->cart_item_id);

            $weight = $cart_item->product_id;
        }else{
            redirect('/home')->with('error', 'your cart is empty');
        }
        EasyPost::setApiKey('EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ');

        // Grab the shipping address from the User model
        $toAddress = \EasyPost\Address::create($this->shippingAddress());
        $product = \EasyPost\Parcel::create($this->productTest($weight));
        $fromAddress = \EasyPost\Address::create($this->fromAddress($shop));

        // Pass the PURCHASE flag.
        // Get the shipment object
        // EasyPost::setApiKey('EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ');
        $shipment = \EasyPost\Shipment::create(array(
            'from_address' => $fromAddress,
            'to_address' => $toAddress,
            'parcel' => $product,

        ));


     return $shipment;
    }

    public function newCheckoutApi(Request $request)
    {
        return $request;
    }

    public function newCheckout(Request $request)
    {

        $user = auth::user();
        $address = auth::user()->temporaryAddress;
        $shop = shop::find($request['shop_id']);
        if ($user->cart !== null) {
            $cart_item = cart_items::find($request->cart_item_id);
            $weight = $cart_item->product_id;
        }else{
            redirect('/home')->with('error', 'your cart is empty');
        }
        if ($address == !null) {
            //EasyPost
//          return $shipment;
            $temporaryAddress = auth::user()->temporaryAddress;
            $getShop = shop::find($request->shop_id);
            EasyPost::setApiKey('EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ');

            // Grab the shipping address from the User model
            $toAddress = \EasyPost\Address::create($this->shippingAddress());
            $product = \EasyPost\Parcel::create($this->productTest($weight));
            $fromAddress = \EasyPost\Address::create($this->fromAddress($shop));

            $shipment = \EasyPost\Shipment::create(array(
                'from_address' => $fromAddress,
                'to_address' => $toAddress,
                'parcel' => $product,

            ));

            //if user already has a cart
            if ($user->cart !== null) {
                $cart_item = cart_items::find($request->cart_item_id);
            } else {
                redirect('/home')->with('error', 'your cart is empty');
            }
            return view('checkoutWithSupplier')
                ->with('getShop', $getShop)
                ->with('temporaryAddress', $temporaryAddress)
                ->with('cart_item', $cart_item)
                ->with('shipment',$shipment);

        } else {
            return redirect('/shipping_details')->with('error', 'you have no shipping address, Please Add one');
        }
        return redirect('/shipping_details')->with('error', 'you have no shipping address');
        //validate address
        //make single cart item check out;
        //return with deducted cart

    }


    public function rates(Request $request)
    {
        $user = auth::user();

        if ($user->cart !== null) {
            $cart_item = cart_items::find($request->cart_item_id);
            $shop = shop::find($request['shop_id']);
            $weight = $cart_item->product_id;
        }else{
            redirect('/home')->with('error', 'your cart is empty');
        }
        EasyPost::setApiKey('EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ');

        // Grab the shipping address from the User model
        $toAddress = \EasyPost\Address::create($this->shippingAddress());
        $product = \EasyPost\Parcel::create($this->productTest($weight));
        $fromAddress = \EasyPost\Address::create($this->fromAddress($shop));

        // Pass the PURCHASE flag.
        // Get the shipment object
        // EasyPost::setApiKey('EZTK4f50a33b85d14b2eaa51f1736b87bda8aSSWKaSu6OTBtFFEyQjtIQ');
        $shipment = \EasyPost\Shipment::create(array(
            'from_address' => $fromAddress,
            'to_address' => $toAddress,
            'parcel' => $product,

        ));


        return $shipment;

    }

    public function buyRate()
    {
        $shipment = $this->rates();
        $shipment->buy($this->rates->lowest_rate());

    }

    public function proceedToTransaction(Request $request)
    {
        $selectedRate = $request['rate'];
        //  return $selectedRate;
        $shipment = $this->rates($request);

        $poso = \EasyPost\Rate::retrieve($shipment->rates[$selectedRate]);
        //ToDocheck if user has a checkout component
        $userCheckOutComponent = auth::user()->checkoutComponent;
//        return $userCheckOutComponent;
        if ($userCheckOutComponent == !null) {
            $userCheckOutComponent->delete();
            $newComponant = new checkoutComponent();
            $newComponant->rate_price = $poso->retail_rate;
            $newComponant->rate_id = $poso->id;
            $newComponant->rate_index = $selectedRate;
            $newComponant->shop_id = $request->input('shop_id');
            $newComponant->cart_item_id = $request->input('cart_item_id');
            $newComponant->user_id = auth::user()->id;
            $newComponant->save();
            return redirect('/pendingorders')->with('success','order placed ');

        } else {
            $newComponant = new checkoutComponent();
            $newComponant->shop_id = $request->input('shop_id');
            $newComponant->cart_item_id = $request->input('cart_item_id');
            $newComponant->user_id = auth::user()->id;
            $newComponant->rate_price = $poso->retail_rate;
            $newComponant->rate_id = $poso->id;
            $newComponant->rate_index = $selectedRate;
            $newComponant->save();
            return redirect('/pendingorders');
        }
    }

    public function pendingorders(){

        $pending = auth::user()->pendingOrders;
        return view('pendingOrders')->with('pending',$pending);
    }

    public function pendingordersApi(){

        $pending = auth::user()->pendingOrders;
        return response()->json([
            'success' => true,
            'PendingOrders' => $pending,
        ]);
    }

    public function savePendingOrder(Request $request){
        //check if cart item exists
        $cart_item = cart_items::findorfail($request->input('cart_item_id'));
        //check if user has already ordered the same item

        if($cart_item ==! null ){
            $pending = pendingorders::where('user_id','=',auth::user()->id)->where('cart_item_id','=',$request['cart_item_id'])->first();
            if($pending ==! null){
                return redirect('/pendingorders')->with('error','You have already placed an order for this item check under your pending orders');
            }
            $pendingOrders = new pendingorders();
            $pendingOrders->user_id = auth::user()->id;
            $pendingOrders->shop_id = $request['shop_id'];
            $pendingOrders->cart_item_id = $request['cart_item_id'];
            $pendingOrders->save();

            return redirect('/pendingorders')->with('success','We successfully placed your order');
        }else{

        }
    }

    public function placeOrder(Request $request)
    {
        $user = auth::user();
        $address = auth::user()->temporaryAddress;
        $shop = shop::find($request['shop_id']);

        if ($user->cart !== null) {
            $cart_item = cart_items::find($request->cart_item_id);
        } else {
            return redirect('/home')->with('error', 'your cart is empty');
        }
        if ($address == !null) {
            $getShop = shop::find($request->shop_id);
            $temporaryAddress = auth::user()->temporaryAddress;
            $shop_id = $request['shop_id'];
            $cart_item_id = $request['cart_item_id'];
            return view('placeOrder')
                ->with('cart_item',$cart_item)
                ->with('temporaryAddress',$temporaryAddress)
                ->with('shop_id',$shop_id)
                ->with('cart_item_id',$cart_item_id)
                ->with('getShop',$getShop);
        }else{
            return redirect('/shipping_details')->with('error', 'You dont have a shipping addresss');
        }
    }
    //placing orders for the api
    // select checkout option cart item and shop id are needed
    //place order
    //view pending orders
    // wait for checkout
    //proceed to checkout

    public function placeOrderApi(Request $request)
    {
        //check if cart item exists
        $cart_item = cart_items::findorfail($request->input('cart_item_id'));
        //check if user has already ordered the same item

        if($cart_item ==! null ){
            $pending = pendingorders::where('user_id','=',auth::user()->id)->where('cart_item_id','=',$request['cart_item_id'])->first();
            if($pending ==! null){
                return response()->json([
                    'success' => true,
                    'message' => 'You have already placed an order for this item check under your pending orders',
                ]);
            }
            $pendingOrders = new pendingorders();
            $pendingOrders->user_id = auth::user()->id;
            $pendingOrders->shop_id = $request['shop_id'];
            $pendingOrders->cart_item_id = $request['cart_item_id'];
            $pendingOrders->save();
            return response()->json([
                'success' => true,
                'message' => 'We successfully placed your order',
            ]);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'Cart is empty',
            ]);
        }
    }


    public function proceedToTransactionApi(Request $request)
    {


        $selectedRate = $request['rate_index'];
        //  return $selectedRate;
        $shipment = $this->rates($request);

        $poso = \EasyPost\Rate::retrieve($shipment->rates[$selectedRate]);
        // $price =

        // $rate_id = MAIHWEEEEEE

        //ToDocheck if user has a checkout component
        $userCheckOutComponent = auth::user()->checkoutComponent;
//        return $userCheckOutComponent;
        if ($userCheckOutComponent == !null) {
            $userCheckOutComponent->delete();
            $newComponant = new checkoutComponent();
            $newComponant->rate_index = $selectedRate;
            $newComponant->shop_id = $request->input('shop_id');
            $newComponant->cart_item_id = $request->input('cart_item_id');
            $newComponant->rate_price = $poso->retail_rate;
            $newComponant->rate_id = $poso->id;
            $newComponant->user_id = auth::user()->id;
            $newComponant->save();

            return response()->json([
                'success' => true,
                'message' => 'Component created Proceed to checkout',
            ]);
        } else {
            $newComponant = new checkoutComponent();
            $newComponant->rate_index = $selectedRate;
            $newComponant->shop_id = $request->input('shop_id');
            $newComponant->cart_item_id = $request->input('cart_item_id');
            $newComponant->rate_price = $poso->retail_rate;
            $newComponant->rate_id = $poso->id;
            $newComponant->user_id = auth::user()->id;
            $newComponant->save();
            return response()->json([
                'success' => true,
                'message' => 'Component created Proceed to checkout',
            ]);

        }

    }

    public function getSupplierDetails(Request $request){
      $id =  $request['cart_item_id'];
      $cart_item =cart_items::find($id);
      $product = product::find($cart_item->product_id);
      $shopId = $product->shop_id;
      $shop = shop::find($shopId);

        return response()->json([
            'success' => true,
            'shop' => $shop,
        ]);
    }



}
