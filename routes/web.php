<?php

use App\Http\Controllers\MyHomeController;
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
Route::get('/cart', function() {
    return view('cart');
});
Route::view('/admins','admin.dashboard')->name('admins');
// Route::view('/admin', 'admin.index');
Route::view('/slideshow', 'admin.slideshow')->name('/slideshow');



