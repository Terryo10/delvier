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
Route::post('login', 'LoginController@login');
Route::post('logout', 'TestController@logout');

Route::group(['middleware' => 'auth:api'], function () {
Route::get('categories', 'CartegoryController@ApiCategory');
Route::get('products','ApiController@products');
Route::post('cart/save', 'CartController@savecartApi')->name('savetocart');
Route::get('cart/view', 'CartController@viewCartApi');
Route::get('cart/increment', 'CartController@incrementApi');
Route::get('cart/decrement', 'CartController@decrementApi');
Route::get('cart/count', 'CartController@cartCountApi');
Route::delete('cart/delete', 'CartController@deleteCartItemApi');
Route::get('total', 'CartController@totalApi');
Route::post('/pay', 'CartController@checkoutMobile')->name('pay.braintree');
Route::get('/client_token','CartController@getToken');
Route::get('orders', 'OrderController@index');
Route::get('cart/count', 'CartController@cartCount');
Route::get('search', 'productController@searchmobile')->name('search');

//Messenger routes chibababababababababababababababababab
Route::get('/contacts', 'ContactsController@Apiget');
Route::get('/conversation', 'ContactsController@getMessagesForApi');
Route::post('/conversation/send', 'ContactsController@sendApi');


//talk to 


});




