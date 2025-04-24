<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MyHomeController extends Controller
{
    public function index(){
        $products = Product::All();
        return view('home',compact('products'));
    }
}
