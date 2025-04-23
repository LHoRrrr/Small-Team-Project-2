<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySlideshowController extends Controller
{
    public function slideshow(){
        return view('admin.slideshow');
    }
}
