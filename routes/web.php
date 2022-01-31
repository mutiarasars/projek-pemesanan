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

Route::get('/', 'MenuController@index')->name('index');

//route beli
Route::get('/pesan/order/', 'OrderController@user_pesan')->name('pesan');
Route::get('/order/{categories:id}', 'OrderController@beli')->name('beli');
Route::post('/order/pay/{categories:id}', 'OrderController@beli_send')->name('beli.send');
//end route beli
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route total order
Route::get('/home/user/order', 'OrderController@order')->name('user.order');
Route::get('/home/user/order/edit/{order:id}', 'OrderController@edit_order')->name('user.order.edit');
Route::any('/home/user/order/edit/update/{order:id}', 'OrderController@update_order')->name('user.order.update');
Route::get('/home/user/pay-take/code', 'OrderController@ambil_produk')->name('user.order.ambil');
//end

//ROUTE ADMIN
Route::get('/admin/login', 'AdminController@login_form')->name('admin');
Route::post('/logined', 'AdminController@adminLogin')->name('login.admin');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');
//END ROUTE ADMIN

Route::group(["middleware" => [\App\Http\Middleware\LoginSessions::class]], function () {
  Route::get('/admin/dashboard', 'AdminController@admin_dashboard')->name('admin.dashboard');

  // categoriess routes
  Route::get('/admin/categories/', 'CategoriesController@category')->name('admin.categories');
  Route::get('/admin/categories/create', 'CategoriesController@insert_form')->name('admin.categories.add');
  Route::post('/admin/categories-insert', 'CategoriesController@insert_cat')->name('admin.categories.send');
  Route::get('/admin/categories/edit/{categories:id}', 'CategoriesController@edit_cat_form')->name('admin.categories.edit');
  Route::post('/admin/categories/edit/{categories:id}', 'CategoriesController@update')->name('admin.categories.update');
  Route::any('/admin/hapus/categories/{id}', 'CategoriesController@delete')->name('admin.categories.delete');
  // END categoriess routes

  //routes checkout
  Route::get('/admin/checkout/status', 'AdminController@checkout_list')->name('admin.checkout');
  Route::get('/admin/order/status', 'AdminController@order_list')->name('admin.order');

  //end
});
