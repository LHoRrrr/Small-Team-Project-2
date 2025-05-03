<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function cart(){
        $slideshow = Slideshow::all();
        return view('cart',compact('slideshow'));
    }
}
