<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MySlideshowController extends Controller
{
    public function slideshow(){
        $products = Product::All();
        return view('admin.slideshow',compact('products'));
    }
}
