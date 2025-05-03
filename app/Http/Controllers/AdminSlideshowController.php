<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;

class AdminSlideshowController extends Controller
{
    public function added(Request $request)
{
    $request->validate([
        'title' => 'required',
        'enable' => 'required|in:0,1',
        'ssorder' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
    }

    Slideshow::create([
        'title' => $request->title,
        'image' => $imageName,
        'enable' => $request->enable,
        'ssorder' => $request->ssorder,
    ]);

    return redirect()->route('slideshows')->with('success', 'Slideshow created successfully.');
}
    
    public function add(){
        return view('admin.addSlideshow');
    }
}
