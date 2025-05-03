<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SlideshowController extends Controller
{
    public function index(){
        $slideshow = Slideshow::All();
        return response()->json([
            'status' => 'success',
            'data' => $slideshow
        ]);
    }
    public function show($id){
        return Slideshow::findOrFail($id);
    }
    public function destroy($id){
        $slideshow = Slideshow::findOrFail($id);

        if (!Auth::user()->isAdmin){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($slideshow->image) {
            $imagePath = public_path('img/' . $slideshow->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $slideshow->delete();
        return response()->json(['message' => 'Slideshow deleted.']);
    }
}
