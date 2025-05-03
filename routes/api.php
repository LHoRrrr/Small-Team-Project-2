<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideshowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Models\Slideshow;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token], 200);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    //product api
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/{id}',[ProductController::class, 'show']);
    Route::delete('/product/{id}',[ProductController::class, 'destroy']);
    //slideshow api
    Route::get('/slideshow',[SlideshowController::class, 'index']);
    Route::get('/slideshow/{id}',[SlideshowController::class, 'show']);
    Route::delete('/slideshow/{id}',[SlideshowController::class, 'destroy']);
  });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
