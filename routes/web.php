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

Route::get('/','GroversController@index')->name('grovers');


Auth::routes();/* 
Route::get('/', 'HomeController@index')->name('home'); */
Route::get('/admin','DashboardController@index');

//Menu Routes
Route::resource('menu','MenuController');
Route::delete('menu/destroy/{id}', 'MenuController@destroy'); 
Route::get('menu/{id}/edit','MenuController@edit');
Route::post('menu/update/{id}','MenuController@update');


//Category Routes
Route::resource('category','CategoriesController');
Route::delete('category/destroy/{id}', 'CategoriesController@destroy'); 
Route::get('category/{id}/edit','CategoriesController@edit');
Route::post('category/update/{id}','CategoriesController@update');


//Product Routes
Route::resource('products','ProductsController');
Route::delete('products/destroy/{id}', 'ProductsController@destroy'); 
Route::get('products/{id}/edit','ProductsController@edit');
Route::post('products/update/{id}','ProductsController@update');
Route::get('shop/products','ProductsController@shop')->name('shop.products');

//Deals Routes
Route::resource('deals','DealsController');
Route::delete('deals/destroy/{id}', 'DealsController@destroy'); 
Route::get('deals/{id}/edit','DealsController@edit');
Route::post('deals/update/{id}','DealsController@update');


//Features Routes
Route::resource('features','FeaturesController');
Route::delete('features/destroy/{id}', 'FeaturesController@destroy'); 
Route::get('features/{id}/edit','FeaturesController@edit');
Route::post('features/update/{id}','FeaturesController@update');


//Quality Routes
Route::resource('quality','QualityController');
Route::delete('quality/destroy/{id}', 'QualityController@destroy'); 
Route::get('quality/{id}/edit','QualityController@edit');
Route::post('quality/update/{id}','QualityController@update');

//Subscribers Routes
Route::resource('subscribers','SubscribersController');
Route::delete('subscribers/destroy/{id}', 'SubscribersController@destroy'); 

//Discount Roiscount
Route::resource('discount','DiscountController');
Route::delete('discount/destroy/{id}', 'DiscountController@destroy'); 
Route::get('discount/{id}/edit','DiscountController@edit');
Route::post('discount/update/{id}','DiscountController@update');
Route::get('coupon','DiscountController@coupon');

//Cart Routes

Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart-itemclear','CartController@remove')->name('cart.remove');
Route::post('/shopping-cart-update','CartController@update')->name('cart.update');
Route::get('/cart',"CartController@cart")->name('cart');
Route::get('/cart-count',"CartController@cartcount")->name('cart.count');

//Wishlist Routes
Route::resource('wishlist','WishlistController');
Route::get('wishlist/destroy/{id}','WishlistController@destroy')->name('wishlist.destroy');

//Contact Routes
Route::get('/contact','ContactController@create')->name('contact');
Route::post('/contact-store','ContactController@store')->name('contact.store');
Route::get('/contact-list','ContactController@index')->name('contact.index');
Route::delete('contact/destroy/{id}', 'ContactController@destroy'); 


//Blog Routes
Route::resource('blog','BlogController');
Route::delete('blog/destroy/{id}', 'BlogController@destroy'); 
Route::get('blog/{id}/edit','BlogController@edit');
Route::post('blog/update/{id}','BlogController@update');
Route::get('/displayblog','BlogController@display')->name('displayblog');
Route::get('/singleblog/{id}','BlogController@singledisplay');

?>