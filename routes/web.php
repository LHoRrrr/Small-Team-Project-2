<?php

use App\Http\Controllers\MyCartController;
use App\Http\Controllers\MyDashboardController;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\MyProductController;
use App\Http\Controllers\MySlideshowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSlideshowController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\UserController;
use App\Models\Product;

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
//route api
Route::middleware('auth:sanctum')->group(function () {
  // api users table
  Route::get('/api/users', [UserController::class, 'index']);
  Route::post('/api/users', [UserController::class, 'store']);
  Route::get('/api/users/{id}', [UserController::class, 'show']);
  Route::put('/api/users/{id}', [UserController::class, 'update']);
  Route::delete('/api/users/{id}', [UserController::class, 'destroy']);
  // api user table
  // api product table
  Route::get('/api/product',[ProductController::class, 'index']);
  Route::get('/api/product/{id}',[ProductController::class, 'show']);
  Route::delete('/api/product/{id}',[ProductController::class, 'destroy']);
  // api product table
  // api slideshow table
  Route::get('/api/slideshow',[SlideshowController::class,'index']);
  Route::get('/api/slideshow/{id}',[SlideshowController::class,'show']);
  Route::delete('/api/slideshow/{id}',[SlideshowController::class,'destroy']);
  //api slideshow table
});
//route api

//route user 
//home page for user
Route::get('/',[MyHomeController::class, 'index']
)->name('home');
//home page for user

//cart page for user
Route::get('/cart',[MyCartController::class,'cart']);
Route::get('/addToCart/{id}',[MyCartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/updateCart',[MyCartController::class, 'updateCart'])->name('cart.update');
Route::post('/order',[MyCartController::class, 'order'])->name('order.product');
Route::get('/order-success',[MyCartController::class, 'orderSuccess'])->name('order.success');
//cart page for user
//route user

//route admin
//route admin product
Route::get('/admins/product',[MyProductController::class,'product'])->middleware('isAdmin')->name('product');
Route::get('/admins/product/add',[AdminController::class, 'add'])->middleware('isAdmin')->name('newproduct');
Route::post('admins/product/added', [AdminController::class, 'store'])->middleware('isAdmin')->name('added');
Route::put('admins/product/{id}', [AdminController::class, 'updated'])->middleware('isAdmin')->name('updated');
Route::get('/admins/product/update/{id}',[AdminController::class, 'edit'])->middleware('isAdmin')->name('update');
Route::delete('/admins/product/delete/{id}',[AdminController::class, 'destroy'])->middleware('isAdmin')->name('delete');

//route admin slideshow 
Route::get('/admins/slideshow',[MySlideshowController::class, 'slideshow'])->middleware('isAdmin')->name('slideshows');
Route::get('/admins/slideshow/add',[AdminSlideshowController::class, 'add'])->middleware('isAdmin')->name('addslideshow');
Route::post('/admins/slideshow/',[AdminSlideshowController::class,'added'])->middleware('isAdmin')->name('addedslideshow');
Route::delete('/admins/slideshow/delete/{id}', [AdminSlideshowController::class, 'destroy'])->middleware('isAdmin')->name('deleteSlideshow');

Route::get('/admins/slideshow/{id}/update', [AdminSlideshowController::class, 'edit'])->middleware('isAdmin')->name('editSlideshow');
Route::put('/admins/slideshow/{id}/updatet',[AdminSlideshowController::class, 'edited'])->middleware('isAdmin')->name('updatedSlideshow');

//route admin  dashboard
Route::get('/admins', [AdminController::class, 'index'])->middleware('isAdmin')->name('admins');

//route auth has login, logout, register 
Auth::routes();

//route admin
