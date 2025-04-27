<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slideshow;

class MyHomeController extends Controller
{
    public function index(){
        $products = Product::All();
        $slideshow = Slideshow::All();
    
        return view('home',compact('products','slideshow'));
    }
}
