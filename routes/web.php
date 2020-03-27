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
})->name('welcome');

Route::get('/index', 'FrontEndController@index')->name('index');
// Route::get('/index', 'FrontEndController@show');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/checkout', 'CartController@cart_checkout')->name('cart.checkout');
Route::post('/cart/checkout', 'CartController@pay')->name('cart.checkout');
Route::get('/cart/delete/{id}', 'CartController@cart_delete')->name('cart.delete');
Route::post('/cart/add', 'CartController@add_cart')->name('add.cart');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'sono','middleware' => 'auth'], function() {
    
    Route::get('/product/create','ProductController@create')->name('product.create');
    Route::post('/product/store','ProductController@store')->name('product.store');
    Route::get('/product/show','ProductController@show')->name('product.show');
    Route::get('/product/delete/{id}','ProductController@destroy')->name('product.delete');
    Route::post('/product/update/{id}','ProductController@update')->name('product.update');
    Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');

    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::post('/category/store','CategoryController@store')->name('category.store');
    Route::get('/category/show','CategoryController@show')->name('category.show');
    Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
    Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');


    Route::get('/sub_category/create','SubCategoryController@create')->name('sub_category.create');
    Route::post('/sub_category/store','SubCategoryController@store')->name('sub_category.store');
    Route::get('/sub_category/show','SubCategoryController@show')->name('sub_category.show');
    Route::get('/sub_category/delete/{id}','SubCategoryController@destroy')->name('sub_category.delete');
    Route::post('/sub_category/update/{id}','SubCategoryController@update')->name('sub_category.update');
    Route::get('/sub_category/edit/{id}','SubCategoryController@edit')->name('sub_category.edit');

    
});

