<?php

use App\Http\Controllers\MyCartController;
use App\Http\Controllers\MyDashboardController;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\MyProductController;
use App\Http\Controllers\MySlideshowController;
use Illuminate\Support\Facades\Route;


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

Route::get('/',[MyHomeController::class, 'index']
);

Route::get('/cart',[MyCartController::class,'cart']);

Route::get('/admins', [MyDashboardController::class, 'dashboard']);

Route::get('/slideshow',[MySlideshowController::class, 'slideshow']);
Route::get('/product',[MyProductController::class,'product']);
#Route::view('/slideshow', 'admin.slideshow')->name('/slideshow');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
