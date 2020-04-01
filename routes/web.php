<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//General User Routes

Route::get('shops/personal', 'PagesController@personalShops')->middleware('auth');
Route::get('categories','PagesController@categories');
Route::get('cart', 'CartController@index');



// Admin Routes 
Route::get('admin','PagesController@admin');
Route::resource('category', 'CartegoryController');
Route::get('users','AdminController@users');
Route::get('shop-manager', 'AdminController@shops');
Route::get('orders/manager','AdminController@oders');
Route::get('admin/payouts', 'AdminController@payouts');
Route::get('/admin/delivery', 'AdminController@delivery');
Route::get('products-manager', 'AdminController@products');
Route::get('income-manager', 'AdminController@products');





//Supplier-Owner Route Middlware Approved Supplier
Route::resource('shop', 'ShopController')->middleware('auth');
Route::resource('product','ProductController');
Route::get('/supplier', 'SupplyerController@index');
Route::get('/supplier/shops','SupplyerController@shops');
Route::get('/supplier/settings', 'SupplyerController@settings');
//Route::get('/supplier/products', 'SupplyerController@shops');
Route::get('/supplier/messages', 'SupplyerController@shops');


