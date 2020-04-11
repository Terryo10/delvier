<?php

namespace App\Http\Controllers;

use App\cart;
use App\cart_items;
use App\order as orders;
use App\order_items as orderItems;
use App\product;
use Auth;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth::user();

        //check if user has cart
        if ($user->cart !== null) {
            $total = $this->totalweb();
            $cart = cart::find($user->cart->id);
            $cart_items = $cart->cart_items;
            //return $total;
            //return $cart_items;
            return view('cart')
                ->with('cart_items', $cart_items)
                ->with('total', $total);
        }
        return view('cart')->with('cart_items', null)
            ->with('total', 0);

    }

    public function savecartweb(Request $request)
    {
        $user = auth::user();
        //if user already has a cart
        if ($user->cart !== null) {
            $cart = cart::find($user->cart->id);
        } else {
            $cart = new cart();
            $cart->user_id = $user->id;
            $cart->save();
        }

        $product = product::find($request->input('product_id'));

        if ($cart_item = $this->checkProductInCart($product->id, $cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            $cart_item->quantity = $cart_item->quantity + $request->input('quantity');
            $cart_item->save();
        } else {
            $cart_item = new cart_items();

            $cart_item->quantity = $request->input('quantity');
            $cart_item->product_id = $request->input('product_id');
            $cart_item->price = $product->price;
            $cart_item->cart_id = $cart->id;
        }
        if ($cart_item->quantity > $product->quantity) {
            return Redirect::back()->with('error', 'Product Out Of Stock');

        } else {
            $cart_item->save();
            return Redirect::back()->with('success', 'Product added to cart successfully <a href="/cart">View Your Shopping Cart</a>');
        }
    }

    public function checkProductInCart($product_id, $cart_items)
    {
        foreach ($cart_items as $item) {
            if ($product_id == $item->product_id) {
                return $item;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
    public function deleteCartItem(Request $request)
    {
        $user = auth::user();

        $cart_item = cart_items::find($request->input('cart_item_id'));
        if ($cart_item != null) {
            $cart_item->delete();
            return Redirect::back()->with('success', 'item removed Succesfully');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete()',
            ]);
        }

    }

    public function ecocashPatial()
    {
        return view('checkout.ecopatial');
    }

    public function paypalPartial()
    {
        return view('checkout.paypalpatial');
    }

    public function data()
    {
        $user = auth::user();
        if ($user->cart == null) {
            return redirect('/cart');
        }
        $cart = $user->cart;
        // dd($cart);
        $data = [];
        $data['items'] = [];
        // dd($cart->items);
        foreach ($cart->cart_items as $key => $value) {

            $itemDetail = [
                'name' => $value->product['name'],
                'price' => $value->product['price'],
                'qty' => $value->quantity,

            ];

            $data['items'][] = $itemDetail;
        }

        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Payment Invoice";
        $data['return_url'] = route('payment.store');
        $data['cancel_url'] = route('cart');
        $data['total'] = $total = $this->totalweb();

        return $data;

    }

    public function checkoutPaypal(Request $request)
    {
        $provider = new ExpressCheckout;

        // dd($cart);
        $data = $this->data();

        //give a discount of 10% of the order amount
        // $data['shipping_discount'] = round((10 / 100) * $total, 2);
        $response = $provider->setExpressCheckout($data);
        // x
        if ($this->saveOrder($request, $response)) {
            // This will redirect user to PayPal
            return redirect($response['paypal_link']);
        }

    }

    public function saveOrder(Request $request, $response)
    {
        $user = auth::user();
        if ($user->cart == null) {
            return redirect('/cart');
        }
        $cart = $user->cart;
        // dd($response);
        $order = new orders();
        $order->user_id = Auth::id();
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->payer_id = "payer_id";
        $order->token = $response['TOKEN'];

        $order->save();

        return $order;
    }

    public function saveOrderItems($order)
    {
        $user = auth::user();
        if ($user->cart == null) {
            return redirect('/cart');
        }
        $cart = $user->cart;

        foreach ($cart->cart_items as $item) {
            $order_item = new orderItems();
            $order_item->quantity = $item->quantity;
            $order_item->price = $item->product['price'];
            $order_item->product_id = $item->product_id;
            $order_item->order_id = $order->id;
            $order_item->save();
        }
        return $order;
    }

    public function paymentStore(Request $request)
    {
        $user = auth::user();
        $provider = new ExpressCheckout;
        $data = $this->data();
        $token = $request->input('token');
        $PayerID = $request->input('PayerID');
        $order = orders::where('token', $token)->first();
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
        // dd($response);
        $order->payer_id = $PayerID;
        $order->paymentStatus = $response['PAYMENTINFO_0_PAYMENTSTATUS'];
        $order->save();

        $order = $this->saveOrderItems($order);
        $cart = cart::find($user->cart->id);
        $cart->delete();

        return redirect('/home')->with('success', 'Order Successfully paid Awaiting Delivery');

    }

    // Api Cart
    //Save To cart via Api
    public function saveCartApi(Request $request)
    {
        $user = auth::user();
        if ($user->cart !== null) {
            $cart = cart::find($user->cart->id);
        } else {
            $cart = new cart();
            $cart->user_id = $user->id;
            $cart->save();
        }

        $product = product::find($request->input('product_id'));

        if ($request->input('quantity') > $product->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Out of stock',
            ]);
        } else {

            if ($cart_item = $this->checkProductInCart($product->id, $cart->cart_items)) {
                $cart_item = cart_items::find($cart_item->id);
                $cart_item->quantity = $cart_item->quantity + $request->input('quantity');
                $cart_item->save();
            } else {
                $cart_item = new cart_items();
                $cart_item->quantity = $request->input('quantity');
                $cart_item->product_id = $request->input('product_id');
                $cart_item->price = $product->price;
                $cart_item->cart_id = $cart->id;
            }

            $cart_item->save();
            return response()->json([
                'success' => true,
                'cart_item' => $cart_item,
                'cart_id' => $cart->id,
            ]);
        }
    }
    //Show Cart via authenticated Api
    public function viewCartApi()
    {
        $user = auth::user();
        // dd($user);
        if ($user->cart) {
            $cart = cart::find($user->cart->id);
            return response()->json([
                'success' => true,
                'cart_items' => $cart->cart_items,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty',
            ]);
        }
    }

    //Count Items In cart through authenticated Api
    public function cartCountApi()
    {
        $user = auth::user();
        $quantity = 0;
        if ($user->cart !== null) {
            $cart = cart::find($user->cart->id);
            // $count = $cart->cart_items->count();
            foreach ($cart->cart_items as $item) {
                $quantity += $item->quantity;
            }
            return response()->json([
                'success' => true,
                'cart_count' => $quantity,
            ]);

        } else {
            return response()->json([
                'success' => true,
                'cart_count' => $quantity,
            ]);
        }
    }
    // Increment Quantity of product in cart through authenticated Api
    public function incrementApi(Request $request)
    {
        $user = auth::user();

        if ($cart_item = $this->checkProductInCart($request->input('product_id'), $user->cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            $cart_item->quantity++;
            $cart_item->save();
        }
        return response()->json([
            'success' => true,
            'cart_item' => $cart_item,
        ]);
    }

    //decrement product in cart through authenticated Api
    public function decrementApi(Request $request)
    {
        $user = auth::user();

        if ($cart_item = $this->checkProductInCart($request->input('product_id'), $user->cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            $cart_item->quantity--;
            $cart_item->save();
        }
        return response()->json([
            'success' => true,
            'cart_item' => $cart_item,
        ]);
    }

    //Delete Cart item Through authenticated Api
    public function deleteCartItemApi(Request $request)
    {
        $user = auth::user();

        $cart_item = cart_items::find($request->input('cart_item_id'));
        if ($cart_item != null) {
            $cart_item->delete();
            return response()->json([
                'success' => true,
                'message' => 'deleted',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete()',
            ]);
        }

    }
    //Retrive total amount of products in cart through authentcated Api
    public function totalApi()
    {
        $user = auth::user();

        $cart_items = $user->cart->cart_items;

        if (!$cart_items) {
            return response()->json([
                'success' => true,
                'total' => 0,
            ]);
        } else {
            $total = 0;
            foreach ($cart_items as $item) {
                $total = $total + ($item->quantity * $item->price);
            }
            return response()->json([
                'success' => true,
                'total' => $total,
            ]);
        }
    }

    public function removeFromCartApi(Request $request)
    {
        $user = Auth::user();
        $product_id = $request->input('product_id');
        $cart_items = cart_items::find($product_id);
        $cart_items->delete();

        return response()->json([
            'success' => true,
            'message' => 'deleted',
        ]);
    }

    // adaptive payments paypal

    public function checkoutMobile(Request $request)
    {
        $user = Auth::user();
        $gateway = $this->gateway();
        $amount = $request->amount;

        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);
        // || !is_null($result->transaction)
        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            return response()->json([
                'success' => true,
                'message' => 'Transaction Successful ',
            ]);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return response()->json([
                'success' => false,
                'message' => $result->message,
            ]);

        }

    }

    public function getToken()
    {

        $auth = auth::user();
        $gateway = $this->gateway();
        $token = $gateway->ClientToken()->generate();

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);

    }

    public function checkoutBraintree(Request $request)
    {
        $user = Auth::user();
        $gateway = $this->gateway();
        $amount = $this->totalweb();

        $nonce = $request->payment_method_nonce;
        if ($user->cart == null) {
            return redirect('/cart');
        }
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);
        dd($result);
        //shippingAmount
        /// || !is_null($result->transaction)
        if ($result->success) {
            $transaction = $result->transaction;
            

            $cart = $user->cart;
            // dd($response);
            $order = new orders();
            $order->user_id = Auth::id();
            $order->transaction_ref =  $transaction->id;
            $order->save();
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            return redirect('/home')->with('success', 'Transaction Successful: The id is' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An Error Occurred', $result->message);

        }

    }

    public function brr()
    {
        $gateway = $this->gateway();
        $token = $gateway->ClientToken()->generate();

        return view('brain')
            ->with('token', $token);

    }

    public function gateway()
    {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        return $gateway;

    }
}
