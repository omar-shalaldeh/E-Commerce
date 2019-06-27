<?php
if (version_compare(PHP_VERSION,'7,2,0','>='))
{
    error_reporting(E_ALL ^ E_WARNING);
}
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


Route::get('/','FrontController@index')->name('home');
Route::get('/shirts','FrontController@shirts')->name('shirts');
Route::get('/shirt','FrontController@shirt')->name('shirt');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout','Auth\LoginController@logout');
Route::resource('/cart','CartController');
Route::get('/cart/add-item/{id}','CartController@addItems')->name('cart.additem');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function ()
{

    Route::get('/',function (){
        return view('admin.index');
    })->name('admin.index');
Route::resource('/product','ProductsController');
Route::resource('/category','CategoriesController');
Route::get('/orders/{type}','OrderController@orders')->name('admin.orders');
Route::post('/toggledeliver/{id}','OrderController@toggledeliverd')->name('toggle.deliver');
Route::resource('/review','ProductReviewController');
});

Route::group(['middleware'=>'auth'],function (){

    Route::resource('/address','AddressController');
    Route::get('/checkcart','CeckoutController@shipping')->name('Ceckout.shipping');
});


Route::get('/checkout','CeckoutController@step1')->name('checkout');

Route::get('/payment','CeckoutController@payment')->name('payment');


Route::post('/store/payment','CeckoutController@storepayment')->name('payment.store');
