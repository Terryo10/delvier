<?php

use App\cartegory;
use App\product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    $products = product::inRandomOrder()->paginate(15);
    $newArrivals = product::latest()->take(8)->get();
    $category = cartegory::all();
    return view('welcome')
        ->with('products', $products)->with('newArrivals',$newArrivals);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shoo/{id}', 'ProductController@findproduct');

//General User Routes

Route::get('privacy','PagesController@privacy');
Route::get('about','PagesController@about');
Route::get('shopping', 'PagesController@shop');
Route::get('service', 'PagesController@service');
Route::get('search', 'ProductController@search')->name('search');
Route::get('shops/personal', 'PagesController@personalShops')->middleware('auth');
Route::get('categories', 'PagesController@categories');
Route::get('categories/{id}', 'PagesController@categoriesFetch');
Route::get('cart', 'CartController@index')->name('cart')->middleware('auth');
Route::post('cart/save', 'CartController@savecartweb')->name('savetocart')->middleware('auth');
Route::get('cart/ecocash/partial', 'CartController@ecocashPatial')->middleware('auth');
Route::get('cart/paypal/partial', 'CartController@paypalPartial')->middleware('auth');
Route::get('cart/delete', 'CartController@deleteCartItem')->middleware('auth');
Route::get('/pay_with_paypal', 'CartController@checkoutPaypal')->name('pay.paypal')->middleware('auth');
Route::get('/payment/store', 'CartController@paymentStore')->name('payment.store')->middleware('auth');
Route::get('/shipping_details','CartController@shipping')->middleware('auth');
Route::get('/shipping_change/{id}', 'CartController@shippingChange')->middleware('auth');
//Shippo
Route::get('/checkout/supplier','cleanController@newCheckout')->middleware('auth');
Route::get('rates','cleanController@rates')->middleware('auth');
Route::get('buyrate','cleanController@buyRate');
//Shippo end

//manual orders by supplier
Route::get('placeorder','cleanController@placeOrder')->middleware('auth');
Route::get('savependingorder','cleanController@savePendingOrder')->middleware('auth');
Route::get('pendingorders','cleanController@pendingOrders')->middleware('auth');
Route::get('selectcheckout','cleanController@selectCheckout')->middleware('auth');
//
Route::post('/shipping/store', 'CartController@shippingStore')->name('shipping.store')->middleware('auth');
Route::resource('delivery','DeliveryController');
Route::get('orders', 'OrderController@index');
Route::get('single_order/{id}','OrderController@show');
Route::get('/contacts', 'contactsController@get');
Route::get('/conversation/{id}', 'contactsController@getMessagesFor');
Route::post('/conversation/send', 'contactsController@send');
Route::get('chat','PagesController@chat');

//FAAAAAUUUUKKKKK YOUR CODE BRO
//pay with Braintree
//  Route::get('braintree','CartController@checkoutBraintree')->name('payment.make');
//shipping methods
Route::get('/proceedtotransaction','cleanController@proceedToTransaction');
Route::get('checkout_options','CartController@brr')->middleware('auth');
Route::get('checkout_options_pending','CartController@brr2')->middleware('auth');
Route::post('/pay','CartController@checkoutBraintree')->name('pay.braintree')->middleware('auth');
Route::post('/pay2','CartController@checkoutBraintree2')->name('pay.braintree2')->middleware('auth');

// Admin Routes
Route::group(['middleware' => ['IsAdmin','auth']],function(){
Route::get('admin', 'PagesController@admin');
Route::resource('category', 'CartegoryController');
Route::get('users', 'AdminController@users');
Route::get('/manage_payout/{id}','AdminController@payout' );
Route::get('userview/{id}', 'AdminController@users');
Route::get('user/{id}', 'AdminController@single');
Route::resource('usersm', 'UsersController', ['only' => ['index', 'edit', 'update']]);
Route::get('shop-manager', 'AdminController@shops');
Route::get('orders/manager', 'AdminController@oders');
Route::get('admin/payouts', 'AdminController@payouts');
Route::get('/admin/delivery', 'AdminController@delivery');
Route::get('products-manager', 'AdminController@products');
Route::Resource('commision', 'GlobalCommisionController');
Route::resource('/slider','SliderController');
});
Route::get('/parent/{id}', 'orderItemController@parentOrder');
//Supplier-Owner Route Middlware Approved Supplier
Route::group(['middleware' => ['IsSupplier','auth']],function(){

Route::resource('shop', 'ShopController')->middleware('auth');
Route::get('/deliver/order_item/{id}','orderItemController@deliveryShow');
Route::patch('item_update','orderItemController@deliveryUpdate')->name('item.update');
Route::get('/supplier/pendingorders','SupplyerController@pendingorders');
Route::get('/supplier/show/{id}','SupplyerController@showPending');//pending.update
Route::patch('/supplier/pendingupdate','SupplyerController@pendingUpdate')->name('pending.update');
Route::get('/supplier', 'SupplyerController@index');
Route::get('/supplier/shops', 'SupplyerController@shops');
Route::get('/supplier/settings', 'SupplyerController@settings');
Route::get('/supplier/orders', 'SupplyerController@shopOrders');
Route::get('/supplier/messages', 'SupplyerController@shops');

});
Route::resource('product', 'ProductController');
Route::post('producto/{id}','ProductController@update');
