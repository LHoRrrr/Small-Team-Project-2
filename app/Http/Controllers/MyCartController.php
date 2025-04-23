<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function cart(){
        return view('cart');
    }
}
