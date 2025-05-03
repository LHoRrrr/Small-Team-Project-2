<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }
    public function show($id){
        return Product::findOrFail($id);
    }
    public function destroy($id){
        $product = Product::findOrFail($id);

        if(!Auth::user()->isAdmin){
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }
        if(!$product){
            return response()->json([
                'message' => 'Proudct Id:$id not exit.'
            ],403);
        }
        if ($product->image) {
            $imagePath = public_path('img/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $product->delete();
        return response()->json([
            'message' => 'Product deleted.'
        ]);

    }
}
