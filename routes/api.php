<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'TestController@logout');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('pending_orders','cleanController@pendingordersApi');
    Route::get('place_order','cleanController@placeOrderApi');
Route::get('categories', 'CartegoryController@ApiCategory');
Route::get('category/fetch','CartegoryController@ApiCategoryFetch');
Route::get('products','ApiController@products');
Route::post('cart/save', 'CartController@savecartApi')->name('savetocart');
Route::get('cart/view', 'CartController@viewCartApi');
Route::get('cart/increment', 'CartController@incrementApi');
Route::get('cart/decrement', 'CartController@decrementApi');
Route::get('cart/count', 'CartController@cartCountApi');
Route::delete('cart/delete', 'CartController@deleteCartItemApi');
Route::get('total', 'CartController@totalApi');
    Route::get('total_pending', 'CartController@totalApiPending');
//PAYMENTS .BRAINTREE
Route::post('/pay', 'CartController@checkoutMobile')->name('pay.braintree');
    Route::post('/pay2', 'CartController@checkoutMobile2')->name('pay2.braintree');
Route::get('/client_token','CartController@getToken');
Route::get('orders', 'OrderController@index');
Route::get('cart/count', 'CartController@cartCount');
Route::get('search', 'ProductController@searchmobile')->name('search');
//shipping section
Route::post('/shipping/store', 'CartController@shippingStoreApi');
Route::delete('/shipping_change', 'CartController@shippingChangeApi');
Route::get('/shipping_details','CartController@shippingApi');

//Messenger routes chibababababababababababababababababab
Route::get('/contacts', 'ContactsController@Apiget');
Route::get('/conversation', 'ContactsController@getMessagesForApi');
Route::post('/conversation/send', 'ContactsController@sendApi');

//new checkout
Route::post('/checkout/supplier', 'cleanController@newCheckoutApi');
Route::get('/rates', 'cleanController@ratesApi');
Route::post('/checkoutwithsupplier','cleanController@proceedToTransactionApi');
Route::get('/getshop','cleanController@getSupplierDetails');

});

//Reset Password

Route::post('/password/email','Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');
// Route::get('find/{token}', 'PasswordResetController@find');







