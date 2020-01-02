<?php

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

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:editprofile']);
Route::resource('/admin/product','ProductController');
Route::get('/ViewCard','ProductController@viewcard');
Route::get('/Checkout', [
    'as' => 'checkout',
    'uses' =>'ProductController@checkout'
]);
Route::post('/PostCheckout' , [
    'as' => 'postcheckout',
    'uses' => 'ProductController@postCheckout'
]);
Route::post('/FinishCart' , [
    'as' => 'finishcart',
    'uses' =>'ProductController@postCheckout' ,

]);
Route::post('/UpdateCart' , [
    'as' => 'updatecart',
    'uses'=>'ProductController@UpdateCart' ,
]);