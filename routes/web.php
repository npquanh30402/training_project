<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* HOME PAGE */

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::post('/products/search/', 'App\Http\Controllers\ProductController@search')->name('product.search');

/* USERS */
Route::get('/users', 'App\Http\Controllers\UserDataController@index')->name('user.index');

/* ADMIN DASHBOARD */
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::delete('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');

    /* USERS MANAGEMENT */
    Route::middleware('instructor')->group(function () {
        Route::get('/admin/instructors/{user_type}', 'App\Http\Controllers\Admin\Instructor\AdminInstructorController@index')->name('admin.instructor.index');
        Route::get('/admin/instructors/{user_type}/{id}/edit', 'App\Http\Controllers\Admin\Instructor\AdminInstructorController@edit')->name('admin.instructor.edit');
        Route::put('/admin/instructors/{id}/update', 'App\Http\Controllers\Admin\Instructor\AdminInstructorController@update')->name('admin.instructor.update');
        Route::delete('/admin/instructors/delete/{id}', 'App\Http\Controllers\Admin\Instructor\AdminInstructorController@delete')->name('admin.instructor.delete');
    });
});


/* CART */
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

/* USER LOGIN */
/*Route::get('/register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::post('/register/status', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('/login', 'App\Http\Controllers\UserController@login')->name('user.login');
Route::post('/login/status', 'App\Http\Controllers\UserController@login_confirm')->name('user.login_confirm');*/

Auth::routes();

Route::get('/register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::post('/register/status', 'App\Http\Controllers\UserController@store')->name('user.store');
