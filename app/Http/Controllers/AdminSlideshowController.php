<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function destroy($id) {
        $slideshow = Slideshow::findOrFail($id);

        if ($slideshow->image){
            $imagePath = public_path('img/' . $slideshow->image);
            if (File::exists($imagePath)){
                File::delete($imagePath);
            }
        }
        $slideshow->delete();
        return redirect()->route('slideshows')->with('success', 'Slideshow deleted successfully.');
    }
    public function edit($id){
        $slideshow = Slideshow::where('ssid', $id)->firstOrFail();
        return view('admin.updateSlideshow', compact('slideshow'));
    }
    public function edited(Request $request, $id) {
        $slideshow = Slideshow::findOrFail($id);

        $slideshow->title = $request->title;
        $slideshow->ssorder = $request->ssorder;
        $slideshow->enable = $request->enable;

        
        if($request->hasFile('image')){
            $imageName = time() . '_' .
            $request->image->getClientOriginalName();
            $request->image->move(public_path('img'),$imageName);
            $slideshow->image = $imageName;
        }
        $slideshow->save();
        return redirect()->route('slideshows')->with('success', 'Slideshow updated successfully.');
    }
}
