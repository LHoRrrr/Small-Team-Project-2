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
)->name('home');

Route::get('/cart',[MyCartController::class,'cart']);

//Route::get('/admins', [MyDashboardController::class, 'dashboard'])->middleware('isAdmin');

Route::get('/admins/slideshow',[MySlideshowController::class, 'slideshow']);
Route::get('/admins/product',[MyProductController::class,'product']);
#Route::view('/slideshow', 'admin.slideshow')->name('/slideshow');






Route::get('/admins', [AdminController::class, 'index'])->name('admins');//->middleware('isAdmin');
Auth::routes();
