<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;

class MySlideshowController extends Controller
{
    public function slideshow(){
        $slideshow = Slideshow::All();
        return view('admin.slideshow',compact('slideshow'));
    }
}
