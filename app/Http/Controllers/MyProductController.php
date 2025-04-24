<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class MyProductController extends Controller
{
    
    public function product(){
        $products = Product::All();
        return view('admin.product',compact('products'));
    }
}
