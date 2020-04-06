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

Route::post('register', 'registerController@register');
Route::post('login', 'loginController@login');

Route::group(['middleware' => 'auth:api'], function () {

Route::get('products','ApiController@products');
Route::post('cart/save', 'CartController@savecartApi')->name('savetocart');
Route::get('cart/view', 'CartController@viewCartApi');
Route::get('cart/increment', 'CartController@incrementApi');
Route::get('cart/decrement', 'CartController@decrementApi');
Route::get('cart/count', 'CartController@cartCountApi');
Route::delete('cart/delete', 'CartController@deleteCartItemApi');
Route::get('total', 'CartController@totalApi');
Route::post('/pay_with_paypal', 'CartController@checkoutMobile')->name('pay.paypal');



});


